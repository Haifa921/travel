<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurants.index')->with('restaurants', Restaurant::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create')
            ->with('countries', Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $c =  Restaurant::create($request->input());

        session()->flash('success', 'restaurant created successfully.');

        return redirect(route('restaurants.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.create')
            ->with('countries', Country::all())
            ->with('restaurant', $restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->update($request->input());
        session()->flash('success', 'restaurant updated successfully.');

        return redirect(route('restaurants.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($restaurant->tours != null && $restaurant->tours->count() > 0) {
            session()->flash('error', 'Category cannot be deleted as it is linked to a tour');

            return redirect()->back();
        }

        $restaurant->delete();

        session()->flash('success', 'restaurant Deleted Successfully.');

        return redirect(route('restaurants.index'));
    }
}
