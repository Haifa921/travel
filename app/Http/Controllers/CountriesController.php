<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('countries.index')->with('countries', Country::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c =  Country::create([
            'name' => $request->name
        ]);
        if ($request->hasFile('image')) {
            //upload and delete
            $image = $request->file('image')->store('countries','public');

            $c->media()->create([
                'file_path' => '/storage/'.$image,
                'file_name' => $request->file('image')->getClientOriginalName(),
                'file_size' => '500',
                'file_type' => 'image/jpg',
                'file_status' => true,
                'file_sort' => 0,
                'published' => true,
            ]);
        }


        session()->flash('success', 'Country created successfully.');

        return redirect(route('countries.index'));
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
    public function edit(Country $country)
    {
        $country->load('media');
        return view('countries.create')->with('country', $country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $country->update([
            'name' => $request->name
        ]);
        if ($request->hasFile('image')) {
            //upload and delete
            // dd('');
            $image = $request->file('image')->store('countries','public');
            $country->media()->delete();
            $country->media()->create([
                'file_path' => '/storage/'.$image,
                'file_name' => $request->file('image')->getClientOriginalName(),
                'file_size' => '500',
                'file_type' => 'image/jpg',
                'file_status' => true,
                'file_sort' => 0,
                'published' => true,
            ]);
        }
        dd($country->media->file_path);
        session()->flash('success', 'Country updated successfully.');

        return redirect(route('countries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        if ($country->tours != null && $country->tours->count() > 0) {
            session()->flash('error', 'Category cannot be deleted as it is linked to a tour');

            return redirect()->back();
        }

        $country->delete();

        session()->flash('success', 'Country Deleted Successfully.');

        return redirect(route('countries.index'));
    }
}
