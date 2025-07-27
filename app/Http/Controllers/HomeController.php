<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Hotel,Hotelroom,Package, Product, UserAddress};
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
        $products = Product::with('images')->latest()->get();
        // foreach($products as $product){
        //     dd($product->images[0]->image);
        // }
        $product_list = Product::get();
        return view('index',compact('products','product_list'));
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

    public function profile(){
        $user = Auth::user();
        $address = $user->addresses()->first(); // assuming hasOne or hasMany
        return view('profile', compact('user', 'address'));
    }

    public function profileUpdate(Request $request){
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'mobile'          => 'nullable|string|max:10',
            'address_line1'  => 'nullable|string|max:255',
            'address_line2'  => 'nullable|string|max:255',
            'city'           => 'nullable|string|max:100',
            'state'          => 'nullable|string|max:100',
            'zipcode'        => 'nullable|string|max:20',
            'country'        => 'nullable|string|max:100',
            // 'type'           => 'nullable|string|in:home,work,other',
        ]);

        $user = Auth::user();

        // Update User Info
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);

        // Update or Create Address
        $userAddress = UserAddress::updateOrCreate(
            ['user_id' => $user->id],
            [
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'city'          => $request->city,
                'state'         => $request->state,
                'zipcode'       => $request->zipcode,
                'country'       => $request->country,
                // 'type'          => $request->type,
            ]
        );

        return back()->with('success', 'Profile updated successfully!');
    }
}
