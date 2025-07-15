<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Hotel;
use App\Models\Hotelroom;
use App\Models\Service;
use Carbon\Carbon;
use Razorpay\Api\Card;
use App\Models\Booking;
use App\Models\Package;
use DB;

class SearchController extends Controller
{
    //
    public function hotels(Request $request, $id) {
        $hotels = Hotel::get();
       if($id == 'sandhya-spa-resort-manali') {
          return view('sandya_hotel_manali',compact('hotels'));
       } elseif($id == 'sandhya-kasol') { 
          return view('sandya_hotel_kasol',compact('hotels'));
       } elseif($id == 'sandhya-kullu') {
          return view('sandya_hotel_kullu',compact('hotels'));
       } elseif($id == 'sandhya-village-manali') {
           return view('sandya_village', compact('hotels'));
       } else {
          die("No Hotel Found!");
       }
    }
    
    public function sandhyaVillage(Request $request) {
        $hotels = Hotel::get();
        return view('sandya_village', compact('hotels'));
    }

    public function gallery(Request $request, $id) {
        $hotels = Hotel::get();
        if($id == 'primo-resorts') {
            return view('gallery_sandya_hotel_manali',compact('hotels'));
        } 
    }

    public function search_rooms(Request $request) {
        if($request->has('hotel')) {
            $hotels    = Hotel::get();
            $adults    = Hotel::ADULTS;
            $childrens = Hotel::CHILDRENS;
            $mobiles   = Hotel::hotelMobile($request->hotel);
            $RequestData['hotel']     = $request->hotel;
            $RequestData['adults']    = $request->adults;
            $RequestData['childrens'] = $request->childrens;
            $RequestData['start']     = $request->start;
            $RequestData['end']       = $request->end; 
            $hotel_detail = Hotel::first();
            if($request->has('type')) {
               $roomId = $request->roomid;
               $room_detail = Hotelroom::where('id',$roomId)->where('hotel_id',$request->hotel)->with('roomdetails.images','roomdetails.types','roomdetails.hotels')->first();
               if($room_detail) {
                    return view('rooms_details',compact('room_detail','RequestData','hotel_detail','hotels','adults','childrens','mobiles'));
               } else {
                    return redirect()->back()->with('error','No Room detail Found!');
               }
            } else {
                $rooms = Hotelroom::where('hotel_id',$hotels[0]->id)->with('roomdetails.images','roomdetails.types','roomdetails.hotels')->get();
                if(count($rooms) > 0) {
                    return view('rooms_list',compact('rooms','RequestData','hotel_detail','hotels','mobiles'));
                } else {
                    return redirect()->back()->with('error','No Rooms Found in this Hotels');
                }
            }
           
        } else {
            return redirect()->back()->with('error','Select Hotel Name Firstly!');
        }
    }

    public static function service_detail($id) {
        $service_detail = Service::find($id);
        return $service_detail;
    }

    public function draft_booking(Request $request) {
        $roomId = $request->input('room_id');
        $userId = $request->input('user_id');
        $name   = $request->input('b_name');
        $email  = $request->input('b_email');
        $phone  = $request->input('b_number');
        $adults = $request->input('b_adults');
        $child  = intval($request->input('b_child'));
        $start  = $request->input('b_start');
        $end    = $request->input('b_end');
        $no_rooms = $request->input('b_room_no');
        $extra_person = $request->input('b_extra_person');
        if($request->has('type')) {
            $type = "Package";
            $packageDetail = Package::find($roomId);
            if($extra_person > 0) {
                $extra_person_rate = $packageDetail->extra_person_cost*$extra_person;
            } else {
                $extra_person_rate = 0;
            }
    
            if($child > 0) {
                $extra_child_rate = $packageDetail->extra_child_cost*$child;
            } else {
                $extra_child_rate = 0;
            }
            $totalroomRate = ($packageDetail->amount + $extra_person_rate + $extra_child_rate);
            $hotel_id = $packageDetail->hotel_id;
            $rate = $packageDetail->amount;
        } else {
            $roomDetail = Hotelroom::where('id',$roomId)->with('roomdetails')->first();
            $date = Carbon::parse($start);
            $now  = Carbon::parse($end);
            $diff = $date->diffInDays($now);
            if($diff > 0) {
                $days = $diff;
            } else {
                $days = 1;
            }
            if($extra_person > 0) {
                $extra_person_rate = $roomDetail->roomdetails->extra_person_rate*$extra_person;
            } else {
                $extra_person_rate = 0;
            }
    
            if($child > 0) {
                $extra_child_rate = $roomDetail->roomdetails->extra_child_rate*$child;
            } else {
                $extra_child_rate = 0;
            }
            $type = "Room";
            $totalroomRate = $days*(($no_rooms*$roomDetail->roomdetails->room_rate) + $extra_person_rate + $extra_child_rate);
            $hotel_id = $roomDetail->hotel_id;
            $rate = $roomDetail->roomdetails->room_rate;
        }    

        
        $gst_amt = round(($totalroomRate*12)/100,2);
        $net_amt = $totalroomRate + $gst_amt;
        $InsertData['hotel_id'] = $hotel_id;
        $InsertData['room_id'] = $roomId;
        $InsertData['no_of_rooms'] = $no_rooms;
        $InsertData['no_of_adults'] = $adults;
        $InsertData['no_of_children'] = $child;
        $InsertData['from_date'] = Carbon::parse($start)->format('Y-m-d');
        $InsertData['to_date'] = Carbon::parse($end)->format('Y-m-d');
        $InsertData['user_id'] = $userId;
        $InsertData['user_name'] = $name;
        $InsertData['email'] = $email;
        $InsertData['mobile_number'] = $phone;
        $InsertData['room_price'] = $rate;
        $InsertData['extra_person_price'] = $extra_person_rate;
        $InsertData['extra_children_price'] = $extra_child_rate;
        $InsertData['gross_amount'] = $totalroomRate;
        $InsertData['gst_amount'] = $gst_amt;
        $InsertData['net_amount'] = $net_amt;
        $InsertData['type'] = $type;
        
        $res = $this->get_booked_date(Carbon::parse($start)->format('Y-m-d'),Carbon::parse($end)->format('Y-m-d'),$hotel_id);
        if($res) {
            $call_image = Booking::create($InsertData);
            return response()->json(['status' => true, 'message' => 'success', 'bookingroomDetail' => $call_image]);
        } else {
            return response()->json(['status' => false, 'message' => 'No rooms available in this hotel at given dates']);
        }

        
    }
    
    public function view_rooms($id) {
        $roomdetails = Hotelroom::where('id',$id)->with('roomdetails.types')->first();
        $Url = url('search_rooms?hotel='.$roomdetails->hotel_id.'&adults=1&start='.date('d.m-Y').'&end='.date('d.m-Y').'&childrens=0&type=roomdetail&roomid='.$id);
        return redirect($Url);
    }
    
     public function packages(Request $request,$hotel) {
        $hotel_detail = Hotel::where('slug',$hotel)->first(); 
        if($hotel_detail) {
            $packages = Package::where('hotel_id',$hotel_detail->id)->with('hotels','types')->get();
                if(count($packages) > 0) {
                    $mobiles   = Hotel::hotelMobile($hotel_detail->id);
                    $hotels    = Hotel::get();
                    return view('package_list',compact('packages','hotel_detail','mobiles','hotels'));
                } else {
                    $packages = [];
                    $mobiles   = Hotel::hotelMobile($hotel_detail->id);
                    $hotels    = Hotel::get();
                    $error = 'No Package Found in this Hotels';
                    return view('package_list',compact('error','hotel_detail','mobiles','hotels','packages'));
                    //return redirect()->back()->with('error','No Package Found in this Hotels');
                }
           
        } else {
            return redirect()->back()->with('error','no Hotel Found!');
        }
    }
    
    public function package_detail(Request $request, $slug) {
        $package_detail = Package::where('slug',$slug)->with('hotels','types')->first();
        if($package_detail) {
            $hotels    = Hotel::get();
            $adults    = Hotel::ADULTS;
            $childrens = Hotel::CHILDRENS;
            $mobiles   = Hotel::hotelMobile($request->hotel);
            return view('package_detail',compact('package_detail','adults','mobiles','hotels','childrens'));
        } else {
            return redirect()->back()->with('error','No Package Found in this Hotels');
        }
    }
    
    private function get_booked_date($startDate,$endDate,$hotelId) {
    
        $res = DB::table('all_booked_date')->whereBetween('date', [$startDate, $endDate])->where('hotel_id',$hotelId)->get();
        if(count($res) > 0) {
           return false;  
        } else {
            return true;
        }
    }
}
