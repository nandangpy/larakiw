@extends('layouts.front-main')
@section('container')
<!-- About Tentang Kami-->
<!--================================
=            Page Title            =
=================================-->

<section class="section page-title">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <!-- Page Title -->
                <h1>Berita</h1>
            </div>
        </div>
    </div>
</section>

<!--====  End of Page Title  ====-->

<!--======================================
=            Featured Article            =
=======================================-->
<section class="section featured-article">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article class="featured">
                    <!-- Image -->
                    <div class="image">
                        <a href="blog-single.html"><img class="img-fluid" src="images/feature/featured-article.jpg"
                                alt="featured-article"></a>
                    </div>
                    <!-- written-content -->
                    <div class="content">
                        <!-- Post Title -->
                        <h2><a href="blog-single.html">Introducing New IOS App</a></h2>
                        <!-- Tags -->
                        <ul class="list-inline post-tag">
                            <li class="list-inline-item">
                                <img class="img-fluid" src="images/testimonial/feature-testimonial-thumb.jpg"
                                    alt="author-thumb">
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Thomas Johnson</a>
                            </li>
                            <li class="list-inline-item">
                                August 8, 2017
                            </li>
                        </ul>
                        <!-- Post Body -->
                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. eget tortor risus.
                            Vivamus magna justo, lacinia eget consectetur sed,convallis at tellus. Vivamus suscipit
                            tortor eget felis porttitor volutpat.Curabitur arcu erat, accumsan id imperdiet et,
                            porttitor at sem. Praesent sapien massa, convallis</p>
                        <a class="btn btn-main-sm" href="blog-single.html">Read more</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!--====  End of Featured Article  ====-->
<section class="post-grid section pt-0">
    <div class="container">
        <div class="row">
            @foreach ($allNews as $listNews)
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
                        <h3><a href="{{ route('news-show', $listNews->slug ) }}">{{ $listNews->title }}</a>
                        </h3>
                        {{-- <h3><a href="/news/{{ $listNews->slug }}">{{ $listNews->title }}</a>
                        </h3> --}}
                    </div>
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <ul class="list-inline post-tag">
                            <li class="list-inline-item">
                                {{-- <img src="images/testimonial/feature-testimonial-thumb.jpg" alt="author-thumb">
                                --}}
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
                        <p> {!! Str::words($listNews->content, 15,'....')!!}</p>
                    </div>
                </article>
            </div>
            @endforeach


            <div class="col-12">
                <!-- Pagination -->
                <nav class="pagination-nav">
                    <ul class="pagination">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="ti-angle-right"></i></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--====  End of Privacy Policy  ====-->



{{-- @if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@elseif(session()->has('loginError'))

@endif --}}




{{-- @include('partials.modal') --}}

{{-- <script>
    @error('email')
    $('#loginModal3').modal('show');
    @enderror
</script> --}}
{{--
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}
@endsection