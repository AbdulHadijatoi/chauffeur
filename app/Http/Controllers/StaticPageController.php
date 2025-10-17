<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function faq()
    {
        return view('faq', [
            'title' => 'Frequently Asked Questions (FAQ)'
        ]);
    }
    
    public function help()
    {
        return view('help', [
            'title' => 'Help & Support'
        ]);
    }

    public function aboutUs()
    {
        return view('about-us', [
            'title' => 'About Us'
        ]);
    }
}
