<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function about()
    {
        return view('public.about');
    }

    public function services()
    {
        return view('public.services');
    }

    public function investment()
    {
        return view('public.investment');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
