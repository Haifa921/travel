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
        ->with('countries',Country::all());
        
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
    public function edit($id)
    {
        $restaurant->load('media');
        return view('restaurants.create')->with('restaurant', $restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $restaurant->update([
            'name' => $request->name
        ]);
        if ($request->hasFile('image')) {
            //upload and delete
            // dd('');
            $image = $request->file('image')->store('restaurants','public');
            $restaurant->media()->delete();
            $restaurant->media()->create([
                'file_path' => '/storage/'.$image,
                'file_name' => $request->file('image')->getClientOriginalName(),
                'file_size' => '500',
                'file_type' => 'image/jpg',
                'file_status' => true,
                'file_sort' => 0,
                'published' => true,
            ]);
        }
        dd($restaurant->media->file_path);
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
