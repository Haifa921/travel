<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Tag;
use App\Models\TouristPlace;
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
        $destinations = Country::withCount('tours')->orderBy('tours_count')->take(4)->get();
        $places = TouristPlace::withCount('tours')->orderBy('tours_count')->take(9)->get();
        // dd($destinations);
        return view('welcome')
        ->with('destinations', $destinations)
        ->with('places', $places)
            ->with('categories', Category::all())
            ->with('tags', []);
    }
    public function packages()
    {
        return view('packages')
            // ->with('destinations', Destinations::paginate(3))
            ->with('places', TouristPlace::inRandomOrder()->take(4)->get())
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
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
