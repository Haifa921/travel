<?php

namespace App\Http\Middleware;

use App\Models\TouristPlace;
use Closure;
use Illuminate\Http\Request;

class VerifyTouristPlacesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (TouristPlace::all()->count() == 0) {
            session()->flash('error', 'Create tourist place before adding a tour.');

            return redirect(route('categories.create'));
        }
        return $next($request);
    }
}
