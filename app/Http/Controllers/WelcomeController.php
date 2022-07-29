<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Country;
use App\Models\Tag;
use App\Models\Tour;
use App\Models\TouristPlace;
use App\Models\User;
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
            ->with('users_count', User::count())
            ->with('tours_count', Tour::count())
            ->with('places_count', TouristPlace::count())
            ->with('destinations', $destinations)
            ->with('places', $places)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }
    public function packages()
    {
        return view('packages')
            ->with('tours', Tour::paginate(6))
            ->with('places', TouristPlace::inRandomOrder()->withCount('tours')->take(4)->get())
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }
    public function blog()
    {
        return view('blog')
            ->with('blogs', Blog::paginate(6))
            ->with('tags', Tag::all())
            ->with('categories', Category::all());
    }
    public function about()
    {
        return view('about')->with('tags', Tag::all())
            ->with('categories', Category::all());
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
