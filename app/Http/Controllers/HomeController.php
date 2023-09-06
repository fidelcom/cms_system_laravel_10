<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeAbout()
    {
        $aboutPage = About::find(1);
        return view('frontend.about_page', compact('aboutPage'));
    }
}
