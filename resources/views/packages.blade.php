@extends('layouts.front')
@section('page')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/place-4.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">{{ trans('blog.Places_to_Travel') }}    </h1>
                    <p class="breadcrumbs"><span class="mr-2">
                            <a href="">
                            {{ trans('blog.Home') }} <i class="ion-ios-arrow-forward"></i>
                            </a>
                        </span>
                        <span>{{ trans('blog.Destinations') }}<i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ trans('blog.Best_Place_Destination') }}  </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($places as $p)
                    <div class="col-md-3 ftco-animate">
                        <div class="project-destination">
                            <a href="" class="img"
                                style="background-image: url('{{ $p->media[0]->file_path }}');">
                                <div class="text text-gradient">
                                    <h3>{{ $p->country->name }}, {{ $p->name }}</h3>
                                    <span>{{ $p->tours_count }} Tours</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- <section class="ftco-section ftco-no-pb ftco-no-pt">
    	<div class="container">
	    	<div class="row">
					<div class="col-md-12 mb-5">
						<div class="search-wrap-1 search-wrap-notop ftco-animate p-4">
							<form action="#" class="search-property-1">
		        		<div class="row">
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">{{ trans('blog.Destination') }}</label>
		          				<div class="form-field">
		          					<div class="icon"><span class="ion-ios-search"></span></div>
				                <input type="text" class="form-control" placeholder="Search place">
				              </div>
			              </div>
		        			</div>
		        			
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">{{ trans('blog.Price_Limit') }} </label>
		        					<div class="form-field">
		          					<div class="select-wrap">
		                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                      <select name="" id="" class="form-control">
		                        <option value="">$5,000</option>
		                        <option value="">$10,000</option>
		                        <option value="">$50,000</option>
		                        <option value="">$100,000</option>
		                        <option value="">$200,000</option>
		                        <option value="">$300,000</option>
		                        <option value="">$400,000</option>
		                        <option value="">$500,000</option>
		                        <option value="">$600,000</option>
		                        <option value="">$700,000</option>
		                        <option value="">$800,000</option>
		                        <option value="">$900,000</option>
		                        <option value="">$1,000,000</option>
		                        <option value="">$2,000,000</option>
		                      </select>
		                    </div>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				                <input type="submit" value="Search" class="form-control btn btn-primary">
				              </div>
			              </div>
		        			</div>
		        		</div>
		        	</form>
		        </div>
					</div>
	    	</div>
	    </div>
    </section> --}}


    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ trans('blog.Tour_Destination') }} </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($tours as $t)
                    <div class="col-md-4 ftco-animate">
                        <div class="project-wrap">
                            <a href="{{ route('packages.show', $t->id) }}" class="img"
                                style="background-image: url('{{ $t->touristPlace->media[0]->file_path }}');">
                                <p class="p-2">
                                    {{ $t->touristPlace->category->name }}
                                </p>
                            </a>
                            <div class="text p-4">
                                <span class="price">${{ $t->price }}/person</span>
                                <span class="days">{{ $t->duration }} Days Tour</span>
                                <h3 style="font-size:medium">
                                    <a href="{{ route('packages.show', $t->id) }}">
                                        {{ $t->name_with_place }}
                                    </a>
                                </h3>
                                <ul>
                                    {{-- <li><span class="flaticon-shower"></span>2</li> --}}
                                    <li><span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                            </svg>
                                    </span>{{ trans('blog.available') }}</li>
                                    <li><span><svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-2" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                                style="width:20px">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg></span>{{ $t->touristPlace->country->name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $tours->links() }}

        </div>
    </section>
@endsection
