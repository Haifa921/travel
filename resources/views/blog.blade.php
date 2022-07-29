@extends('layouts.front')
@section('page')

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/destination-5.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Travel Tips &amp; Blog</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="">Home <i class="ion-ios-arrow-forward"></i></a></span>
            <span>News/Tips <i class="ion-ios-arrow-forward"></i></span></p>
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
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <a href="#" class="img" style="background-image: url(images/bali.jpeg);">
              <p class="p-2">
                {{$blog->category->name}}
              </p>
            </a>
            <div class="text p-4">
              <h3><a href="">
                  {{$blog->title}}
                </a></h3>
            </div>
          </div>
        </div>
        @endforeach


      </div>
      {{ $blogs->links() }}
  </section>
@endsection
