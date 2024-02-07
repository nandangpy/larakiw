@extends('layouts.front-main')
@section('container')

<section class="section blog-single">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <!-- Single Post -->
                <article class="single-post">
                    <!-- Post title -->
                    <div class="post-title text-center">
                        <h1>{{ $showBerita->title }}</h1>
                        <!-- Tags -->
                        <ul class="list-inline post-tag">
                            <li class="list-inline-item">
                                {{-- <img src="images/testimonial/feature-testimonial-thumb.jpg" alt="author-thumb">
                                --}}
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Nandang Prayogi S,Kom.</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">August 8, 2017</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Post body -->
                    <div class="post-body">
                        <!-- Feature Image -->
                        <div class="feature-image">
                            <img class="img-fluid" src="images/blog/single-blog-feature-image.jpg" alt="feature-image">
                        </div>
                        <!-- Paragrapgh -->
                        <p> {{ $showBerita->content }} </p>

                    </div>
                </article>
                <!-- About Author Widget -->
                <div class="about-author">

                    <div class="media">
                        <!-- Author Image -->
                        <div class="image">

                            <ul class="list-inline social-links">
                                <li class="list-inline-item"><a href="#"><i class="ti-heart"></i></a></li>
                                <li class="list-inline-item"><a href="##"><i class="ti-bookmark"></i></a></li>

                            </ul>
                        </div>
                        <!-- About Author -->

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--====  End of Single Article  ====-->

<!--======================================
=            Related Article            =
=======================================-->
<section class="section related-articles bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 title">
                <!-- Section Title -->
                <h2>Related Articles</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <!-- Post -->
                <article class="post-sm">
                    <!-- Post Image -->
                    <div class="post-thumb">
                        <a href="blog-single.html"><img class="w-100" src="images/blog/post-01.jpg"
                                alt="Post-Image"></a>
                    </div>
                    <!-- Post Title -->
                    <div class="post-title">
                        <h3><a href="blog-single.html">Innovation distinguishes between a leader and a follower.</a>
                        </h3>
                    </div>
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <ul class="list-inline post-tag">
                            <li class="list-inline-item">
                                <img src="images/testimonial/feature-testimonial-thumb.jpg" alt="author-thumb">
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Thomas Johnson</a>
                            </li>
                            <li class="list-inline-item">
                                August 8, 2017
                            </li>
                        </ul>
                    </div>
                    <!-- Post Details -->
                    <div class="post-details">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. </p>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Post -->
                <article class="post-sm">
                    <!-- Post Image -->
                    <div class="post-thumb">
                        <a href="blog-single.html"><img class="w-100" src="images/blog/post-02.jpg"
                                alt="Post-Image"></a>
                    </div>
                    <!-- Post Title -->
                    <div class="post-title">
                        <h3><a href="blog-single.html">Design is not just what it looks like and feels like. Design is
                                how it works.</a></h3>
                    </div>
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <ul class="list-inline post-tag">
                            <li class="list-inline-item">
                                <img src="images/testimonial/feature-testimonial-thumb.jpg" alt="author-thumb">
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Thomas Johnson</a>
                            </li>
                            <li class="list-inline-item">
                                August 8, 2017
                            </li>
                        </ul>
                    </div>
                    <!-- Post Details -->
                    <div class="post-details">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. </p>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Post -->
                <article class="post-sm">
                    <!-- Post Image -->
                    <div class="post-thumb">
                        <a href="blog-single.html"><img class="w-100" src="images/blog/post-03.jpg"
                                alt="Post-Image"></a>
                    </div>
                    <!-- Post Title -->
                    <div class="post-title">
                        <h3><a href="blog-single.html">Design is not just what it looks like and feels like. Design is
                                how it works.</a></h3>
                    </div>
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <ul class="list-inline post-tag">
                            <li class="list-inline-item">
                                <img src="images/testimonial/feature-testimonial-thumb.jpg" alt="author-thumb">
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Thomas Johnson</a>
                            </li>
                            <li class="list-inline-item">
                                August 8, 2017
                            </li>
                        </ul>
                    </div>
                    <!-- Post Details -->
                    <div class="post-details">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. </p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

@endsection