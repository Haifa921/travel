<?php

namespace App\Http\Controllers;

use App\Category;
use App\Destinations;
use App\Tag;
use App\Blog;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        // $search = request()->query('search');
        // if (request()->query('search')) {
        //     $destinations = Destinations::where('title', 'LIKE', "%{$search}%")->simplePaginate(3);
        // } else {
        //     $destinations = Destinations::simplePaginate(3);
        // }

        // return view('welcome')
        //     ->with('destinations', $destinations)
        //     ->with('categories', Category::all())
        //     ->with('tags', Tag::all());
        return view('welcome')
            ->with('destinations', [])
            ->with('categories', [])
            ->with('tags', []);
    }


    public function about()
    {
        return view('about');
    }


    public function contact()
    {
        return view('contact')
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }
    public function Bali()
    {
        return view('Bali')
            ->with('destinations', Destinations::all())
            ->with('tags', Tag::all())
            ->with('categories', Category::all());
    }
}
