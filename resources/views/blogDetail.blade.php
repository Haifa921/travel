@extends('layouts.front')
@section('page')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/blogdetail.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Travel Tips &amp; Blog</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span>
                        <span><a href="{{route('news.index')}}">News/Tips <i class="ion-ios-arrow-forward"></i></a></span>
                        <span>{{ $blog->title }} <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-md-last ftco-animate py-md-5 mt-md-5 fadeInUp ftco-animated">
                    <h2 class="mb-3">{{ $blog->title }}</h2>
                    <img src="{{ $blog->media->file_path }}" alt="" class="img-fluid">
                    </p>
                    <p>{{ $blog->description }}</p>
                    <h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
                    <p>{{ $blog->content }}</p>

                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            @foreach ($blog->tags as $t)
                                <a href="#" class="tag-cloud-link">{{ $t->name }}</a>
                            @endforeach

                        </div>
                    </div>
                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio mr-5">
                            <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc">
                            <h3>George Washington</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                                necessitatibus
                                voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                                similique,
                                inventore eos fugit cupiditate numquam!</p>
                        </div>
                    </div>
                    {{-- <div class="pt-5 mt-5">
                        <h3 class="mb-5">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste
                                        iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste
                                        iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="images/person_1.jpg" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe</h3>
                                            <div class="meta">October 03, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                                laborum
                                                necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim
                                                sapiente
                                                iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>
                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>John Doe</h3>
                                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                        quidem
                                                        laborum necessitatibus, ipsam impedit vitae autem, eum officia,
                                                        fugiat saepe
                                                        enim sapiente iste iure! Quam voluptas earum impedit necessitatibus,
                                                        nihil?
                                                    </p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>
                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard bio">
                                                            <img src="images/person_1.jpg" alt="Image placeholder" />
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>John Doe</h3>
                                                            <div class="meta">October 03, 2018 at 2:21pm</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Pariatur
                                                                quidem laborum necessitatibus, ipsam impedit vitae autem,
                                                                eum
                                                                officia, fugiat saepe enim sapiente iste iure! Quam voluptas
                                                                earum
                                                                impedit necessitatibus, nihil?</p>
                                                            <p><a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder" />
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste
                                        iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>
                        </ul>
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                </div>
                            </form>
                        </div> 
                    </div> --}}
                </div>
                <div class="col-lg-4 sidebar ftco-animate bg-light py-md-5 fadeInUp ftco-animated">
                    {{-- <div class="sidebar-box pt-md-5">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div> --}}
                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <div class="categories">
                            <h3>Categories</h3>
                            @foreach ($categories as $c)
                                <li><a href="#">{{ $c->name }} <span>({{ $c->blogs_count }})</span></a></li>
                            @endforeach

                        </div>
                    </div>
                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h3>Recent Blog</h3>
                        @foreach ($recent as $r)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" href="{{ route('blog.show', $r->slug) }}"
                                    style="background-image: url('{{ $r->media->file_path }}');"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">{{ $r->title }}</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span>
                                                {{ \Carbon\Carbon::parse($r->published_at)->format('y-M-d') }}</a></div>
                                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                        {{-- <div><a href="#"><span class="icon-chat"></span> 19</a></div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h3>Tag Cloud</h3>
                        <div class="tagcloud">
                            @foreach ($tagcloud as $t)
                                <a href="#" class="tag-cloud-link">{{ $t->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h3>Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                            voluptate
                            quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique,
                            inventore eos
                            fugit cupiditate numquam!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
