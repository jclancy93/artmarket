<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;            // this handles both for Input and Request as in laravel 5.1 documentation
use App\Http\Controllers\Input;
use App\Http\Requests;
use App\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        $page = Page::find(1);
        return view('about', ['page' => $page]);   
    }

    public function contact()
    {
        $page = Page::find(2);
        return view('contact', ['page' => $page]);   
    }

    public function editAbout() 
    {
         $page = Page::find(1);
        return view('pages.edit', ['page' => $page]);   
    }

    public function updateAbout(Request $request)
    {
        $params = $request->input();

        $page = Page::find(1);
        $page->text = $params['text'];

        $page->save();

        return redirect()->action('HomeController@about');
    }

    public function editContact() 
    {
         $page = Page::find(2);
        return view('pages.edit', ['page' => $page]);   
    }

    public function updateContact(Request $request)
    {
        $params = $request->input();

        $page = Page::find(2);
        $page->text = $params['text'];

        $page->save();

        return redirect()->action('HomeController@contact');
    }
}
