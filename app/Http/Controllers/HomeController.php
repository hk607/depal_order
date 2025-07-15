<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Hotel,Hotelroom,Package};
use Validator;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
        // $hotels = Hotel::get();
        // $rooms = Hotelroom::where('hotel_id',$hotels[0]->id)->with('roomdetails.types', 'roomdetails.images')->get();
        // $package_details = Package::where('hotel_id',$hotels[0]->id)->with('hotels','types')->get();
        // return view('welcome',compact('hotels', 'rooms', 'package_details'));
    }

    public function member_register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|numeric|min:10',
            'pass'  => 'required|min:6|same:c_pass',
        ]);
        if($validator->fails()) {
            $message = $validator->messages()->all();
            if(is_array($message))
            {
                $Explode = implode(",", $message);
            } else {
                $Explode = $message;
            }
            return response()->json(['status' => false, 'message' => 'Invalid Form Data!','error' => $Explode]);
        }

        $data = $request->all();
        $check = $this->create($data);
        $credentials = ['email' => $request->email,'password' => $request->pass];
        if (Auth::attempt($credentials)) {
            return response()->json(['status' => true, 'message' => 'success']);
        }
    }

    public function create(array $data)
    {
      return User::create([
        'name'     => $data['name'],
        'mobile'   => $data['phone'],
        'email'    => $data['email'],
        'password' => Hash::make($data['pass']),
        'role'     => 2
      ]);
    }

    public function member_login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password'  => 'required',
        ]);
        if($validator->fails()) {
            $message = $validator->messages()->all();
            if(is_array($message))
            {
                $Explode = implode(",", $message);
            } else {
                $Explode = $message;
            }
            return response()->json(['status' => false, 'message' => $Explode]);
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['status' => true, 'message' => 'success']);
        } else {
            return response()->json(['status' => false, 'message' => 'Invalid credentials!']);
        }
    }
}
