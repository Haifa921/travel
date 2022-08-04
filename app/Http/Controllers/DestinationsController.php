<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\Destinations\CreateDestinationsRequest;
use App\Http\Requests\Destinations\UpdateDestinationsRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Tour;
use App\Models\TouristPlace;
use PhpParser\Node\Stmt\Catch_;

class DestinationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyTouristPlacesCount')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('destinations.index')->with('destinations', Tour::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('destinations.create')->with('touristPlace', TouristPlace::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDestinationsRequest $request)
    {
        //create post
        $destination = Tour::create([
            'name' => $request->name,
            'description' => $request->description,
            'schedule' => $request->schedule,
            'seats' => $request->seats,
            'price' => $request->price,
            'takeoff_date' => $request->takeoff_date,
            'duration' => $request->duration,
            // 'image' => $image,
            'published_at' => $request->published_at,
            'tourist_place_id' => $request->tourist_place_id
        ]);

        if ($request->tags) {
            $destination->tags()->attach($request->tags);
        }




        //flash message 
        session()->flash('success', 'tour Created Successfully');

        //redirect
        return redirect(route('tours.index'));
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
    public function edit(Tour $tour)
    {
        return view('destinations.create')->with('destination', $tour)->with('touristPlace', TouristPlace::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDestinationsRequest $request, Tour $tour)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'schedule' => $request->schedule,
            'seats' => $request->seats,
            'price' => $request->price,
            'takeoff_date' => $request->takeoff_date,
            'duration' => $request->duration,
            'published_at' => $request->published_at,
            'tourist_place_id' => $request->tourist_place_id
        ];

        if ($request->tags) {
            $tour->tags()->sync($request->tags);
        }
        //update attributes
        $tour->update($data);

        //redirect user
        session()->flash('success', 'Tour updated successfully');

        return redirect(route('tours.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destinations = Tour::withTrashed()->where('id', $id)->firstOrFail();


        if ($destinations->trashed()) {
            $destinations->deleteImage();

            $destinations->forceDelete();
        } else {
            $destinations->delete();
        }

        session()->flash('success', 'Tour deleted successfully');

        return redirect(route('tours.index'));
    }

    /**
     * Display a list of unavailable destinations.
     * @return \Illuminate\Http\Response
     */

    public function trashed()
    {
        $trashed = Tour::onlyTrashed()->get();

        return view('destinations.index')->withdestinations($trashed);
    }

    public function restore($id)
    {
        $destinations = Tour::withTrashed()->where('id', $id)->firstOrFail();
        $destinations->restore();

        session()->flash('success', 'Tour restored successfully.');

        return redirect()->back();
    }
}
