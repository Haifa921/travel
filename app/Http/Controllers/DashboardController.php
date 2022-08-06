<?php

namespace App\Http\Controllers;

use App\Models\TourSubscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with('reservations',TourSubscription::all());
    }
    public function status(TourSubscription $tour, Request $request)
    {
        $tour->update(['status' => $request->tour_status]);
        return back()->with([
            'success' => 'updated successfully',
        ]);
    }
}
