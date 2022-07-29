@extends('layouts.front')
@section('page')
    <section class="hero-wrap hero-wrap-2 " style="background-image: url('images/place-4.jpg');height:9rem"
        data-stellar-background-ratio="0.5">
        <div class="overlay" style="height:6rem"></div>
        <div class="container">
            <div class="row no-gutters slider-text j align-items-end justify-content-center">

            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {{-- <img src="/images/{{ $tour->touristPlace->media[0]->file_path }}" alt="Image" class="img-fluid"> --}}
                    <div class="lightbox">
                        <div class="row">
                            @foreach ($tour->touristPlace->media as $m)
                                <div class="col-lg-6">
                                    <img src="/images/{{ $m->file_path }}" alt="Table Full of Spices"
                                        class="w-100 mb-2 mb-md-2 shadow-1-strong rounded" />
                                </div>
                            @endforeach
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg> 
                                @if (count($tour->tags)>0)
                                @foreach ($tour->tags as $tag)
                                    <i>{{$tag->name}}</i>
                                @endforeach
                                @else
                                not tags for this tour
                                @endif
                            </span>
                            {{-- <div class="col-lg-6">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Vertical/1.webp"
                                        data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Vertical/1.webp"
                                        alt="Dark Roast Iced Coffee" class="w-100 shadow-1-strong rounded" />
                                </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="text-serif text-primary">{{ $tour->touristPlace->category->name }}</span>

                    <h3 class="heading-92913 text-black">{{ $tour->name_with_place }}</h3>

                    <div class="row text-dark">
                        <span class="col-12 days mb-2 block"><i class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </i>
                            {{ $tour->touristPlace->country->name }}, {{ $tour->touristPlace->name }}
                            Tour
                        </span>
                        <span class="col-6 days"><i class="text-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg></i>
                            {{ $tour->duration }} Days
                            Tour
                        </span>
                        <span class="col-6 days"><i class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width:20px" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg></i>
                            {{ $tour->takeoff_date }}
                        </span>
                        <span class="col-6 days"><i class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </i>
                            {{ $tour->seats }}/{{ $tour->seats }} available seats!
                        </span>
                        <span class="col-6 font-weight-bold text-dark"><i class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </i>
                            ${{ $tour->price }}/person
                        </span>
                    </div>
                    <br />
                    <p>{{ $tour->description }}</p>
                    <p></p>
                    <p><a href="#" class="btn btn-primary py-3 px-4">subscrip now</a></p>
                </div>
            </div>
            <hr />
            <div class="row">
                <h4 class="col-12 text-center">available restaurants in this tour!</h4>
            </div>
        </div>
    </section>
@endsection
