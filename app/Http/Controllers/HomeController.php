<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $programs = \App\Models\Program::where('is_active', true)->latest()->take(3)->get();
        $posts = \App\Models\Post::where('is_published', true)->latest()->take(3)->get();
        return view('home.index', compact('sliders', 'programs', 'posts'));
    }

    public function programs()
    {
        $programs = Program::where('is_active', true)->get();
        return view('programs.index', compact('programs'));
    }

    public function showProgram($slug)
    {
        $program = Program::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('programs.show', compact('program'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function gallery()
    {
        $galleries = \App\Models\Gallery::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.gallery', compact('galleries'));
    }
}
