<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function aboutUs(){

        return view('about');
    }
    public function qualityPromise(){

        return view('quality-promise');
    }
    public function certifications(){

        return view('certifications');
    }

    public function contactUs(){

        return view('contact');
    }

}
