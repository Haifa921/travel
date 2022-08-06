@extends('layouts.front')
@section('page')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/about.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread"> {{ trans('blog.About_Us') }}  </h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="">{{ trans('blog.Home') }}  <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>{{ trans('blog.About_Us') }}   <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="about_story mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="story_heading">
                            <h3>{{ trans('blog.Our_Story') }}  </h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-11 offset-lg-1">
                                <div class="story_info">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <p>Consulting represents success at realizing the company is going in the wrong
                                                direction. The only time the company fails is when it is not possible to do
                                                a turnaround anymore. We help companies pivot into more profitable
                                                directions where they can expand and grow. It is inevitable that companies
                                                will end up making a few mistakes; we help them correct these mistakes.</p>
                                            <p>Consulting represents success at realizing the company is going in the wrong
                                                direction. The only time the company fails is when it is not possible to do
                                                a turnaround anymore. We help companies pivot into more profitable
                                                directions where they can expand and grow. It is inevitable that companies
                                                will end up making a few mistakes; we help them correct these mistakes.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="story_thumb">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="thumb padd_1">
                                                <img src="img/about/1.png" alt=""
                                                    data-pagespeed-url-hash="1983699969"
                                                    onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="thumb">
                                                <img src="img/about/2.png" alt=""
                                                    data-pagespeed-url-hash="2278199890"
                                                    onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-section testimony-section bg-bottom" style="background-image: url(images/bg_3.jpg);">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-4">{{ trans('blog.Tourist_Feedback') }}  </h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
