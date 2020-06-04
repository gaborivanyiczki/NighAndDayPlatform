<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function aboutUs()
    {
        return view('aboutus');
    }

    public function news()
    {
        return view('news');
    }

    public function faq()
    {
        return view('faq');
    }

    public function cookiesPolicy()
    {
        return view('cookies-policy');
    }

    public function gdpr()
    {
        return view('gdpr');
    }

    public function paymentMethods()
    {
        return view('payment-methods');
    }

    public function delivery()
    {
        return view('delivery');
    }

    public function makeYourOwn()
    {
        return view('make-your-own');
    }
}
