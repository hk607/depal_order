<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Product};
use Validator;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
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
    public function show(){
        return 1;
    }

}
