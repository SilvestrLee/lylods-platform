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

    public function caseStudies()
    {
        return view('public.case-studies');
    }

    public function insights()
    {
        return view('public.insights');
    }

    public function property()
    {
        return view('public.property');
    }

    public function careers()
    {
        return view('public.careers');
    }

    public function privacy()
    {
        return view('public.privacy');
    }

    public function communityProjects()
    {
        return view('public.community-projects');
    }

    public function privacyNotice()
    {
        return view('public.privacy-notice');
    }

    public function cookieNotice()
    {
        return view('public.cookie-notice');
    }

    public function accessibility()
    {
        return view('public.accessibility');
    }

    public function complaints()
    {
        return view('public.complaints');
    }

    public function terms()
    {
        return view('public.terms');
    }
}
