<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function lang($locale)
    {
        if(in_array($locale,['ar','en'])){

            app()->setLocale($locale);
            session()->put('locale', $locale);

        }
         return redirect()->back();
        //  return view('admin.dashboard');
    }
    public function index()
    {
        return view('admin.dashboard');
    }
    public function welcome()
    {
        app()->setLocale('en');
    //   return  app()->getLocale();
        return view('welcome');
    }

}
