<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Models\TouristPlace;
use Illuminate\Http\Request;

class TouristPlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('places.index')->with('places', TouristPlace::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create')
            ->with('countries', Country::all())
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->images);
        $tour = TouristPlace::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name, '-'),
            'country_id' => $request->country_id,
            'category_id' => $request->category_id,
        ]);
        if ($request->images) {
            foreach ($request->images as  $image) {
                $path = $image->store('places', 'public');

                $tour->media()->create([
                    'file_path' => '/storage/' . $path,
                    'file_name' => $image->getClientOriginalName(),
                    'file_size' => '500',
                    'file_type' => 'image/jpg',
                    'file_status' => true,
                    'file_sort' => 0,
                    'published' => true,
                ]);
            }
        }
        session()->flash('success', 'place Created Successfully');

        return redirect(route('places.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TouristPlace $place)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TouristPlace $place)
    {
        return view('places.create')
            ->with('place', $place)
            ->with('countries', Country::all())
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TouristPlace $place)
    {
        $place->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name, '-'),
            'country_id' => $request->country_id,
            'category_id' => $request->category_id,
        ]);
        if ($request->images) {
            foreach ($request->images as  $image) {
                $path = $image->store('places', 'public');

                $place->media()->create([
                    'file_path' => '/storage/' . $path,
                    'file_name' => $image->getClientOriginalName(),
                    'file_size' => '500',
                    'file_type' => 'image/jpg',
                    'file_status' => true,
                    'file_sort' => 0,
                    'published' => true,
                ]);
            }
        }
        session()->flash('success', 'place updated Successfully');

        return redirect(route('places.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
