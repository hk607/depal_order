<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\Package;
use App\Models\RoomType;
use App\Models\Hotelroom;
use App\Models\Order;
use App\Models\Product;
use Hash;
use Auth;
use DB;

class AdminController extends Controller
{
    //
    public function dashboard(Request $request) {
        $admindashboard='active';
        $orders = Order::where('order_status', 1)->orderBy('id', 'DESC')->limit(10)->get();

        // Total counts using same variable names
        $products = Product::count();
        $categories = Category::count();
        $order = Order::count();
        return view('admin.dashboard',compact('admindashboard','orders','products','categories','order'));
    }

    public function changepassword() {
        $changepassword = 'active';
        return view('admin.changepassword',compact('changepassword'));
    }
    public function updatePassword(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function closeBookingDate() {
        $closebookingdate = 'active';
        $hotel_list   = Hotel::pluck('name','id');
        $closeDates = DB::table('all_booked_date')->where('date', '>=', date('Y-m-d'))->leftJoin('hotels', 'all_booked_date.hotel_id', '=', 'hotels.id')->get();
        return view('admin.closebookingdate',compact('closebookingdate','hotel_list','closeDates'));
    }

    public function updateCloseBookingDate(Request $request) {
        $validatedData = $request->validate([
            'hotel_id' => 'required',
            'closing_date' => 'required|date_format:Y-m-d'
        ]);

        $insertData['hotel_id'] = $request->input('hotel_id');
        $insertData['date'] = $request->input('closing_date');
        DB::table('all_booked_date')->insert($insertData);
        return redirect()->back()->with('success','Close Date Inserted successFully');

    }
}
