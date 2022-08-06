@extends('layouts.front')
@section('page')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/destination-12.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">{{ trans('blog.Contact_Us') }}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="">{{ trans('blog.Home') }} <i
                                    class="ion-ios-arrow-forward"></i></a></span>
                        <span>{{ trans('blog.Contact_Us') }}  <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb contact-section">
        <div class="container">
            <div class="row d-flex contact-info">
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <h3 class="mb-2">{{ trans('blog.Address') }}</h3>
                        <p>Ole Sangale Road, off
                            Langata Road, in Madaraka Estate, Nairobi, Kenya.</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <h3 class="mb-2">{{ trans('blog.Contact_Number') }} </h3>
                        <p><a href="tel://1234567920">+254712345678</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <h3 class="mb-2">{{ trans('blog.Email_Address') }} </h3>
                        <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                        <h3 class="mb-2">{{ trans('blog.Website') }}</h3>
                        <p><a href="#">safari.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <!-- Success message -->
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="#" method="POST" action="{{ route('contact.store') }}"
                        class="bg-light p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('blog.Name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}"
                                name="name" id="name">

                            <!-- Error -->
                            @if ($errors->has('name'))
                                <div class="error">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>{{ trans('blog.Email') }}</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                                name="email" id="email">

                            @if ($errors->has('email'))
                                <div class="error">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>



                        <div class="form-group">
                            <label>{{ trans('blog.Subject') }}</label>
                            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}"
                                name="subject" id="subject">

                            @if ($errors->has('subject'))
                                <div class="error">
                                    {{ $errors->first('subject') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>{{ trans('blog.Message') }}</label>
                            <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                                rows="4"></textarea>

                            @if ($errors->has('message'))
                                <div class="error">
                                    {{ $errors->first('message') }}
                                </div>
                            @endif
                        </div>
                        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
