@extends('layouts.front')
@section('page')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/destination-5.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Travel Tips &amp; Blog</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span>
                        <span>News/Tips <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Recent Blogs</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
                        <div class="blog-entry  justify-content-end" style="width:22rem">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="block-20"
                                style="background-image:url(images/{{ $blog->media->file_path }})">
                            </a>
                            <div class="text mt-3 float-right d-block">
                                <div class="d-flex align-items-center mb-4 topp">
                                    <div class="one">
                                        <span class="day"
                                            style="font-size:xx-large">{{ \Carbon\Carbon::parse($blog->published_at)->format('d') }}</span>
                                    </div>
                                    <div class="two">
                                        <span
                                            class="yr">{{ \Carbon\Carbon::parse($blog->published_at)->format('y') }}</span>
                                        <span
                                            class="mos">{{ \Carbon\Carbon::parse($blog->published_at)->format('M') }}</span>
                                    </div>
                                </div>
                                <h3 class="heading"><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                                </h3>
                                <p>{{ $blog->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            {{ $blogs->links() }}
    </section>
@endsection
