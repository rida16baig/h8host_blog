@extends('layout')

@section('title', 'home page')
@section('style')
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
<style>
    li#cnt_tags a {
    font-size: 1.2rem;
    }
</style>
@endsection
@section('content')
    <div class="container mt-5">
        @section('main_section')
            <section id="hero_section" class="swiper-container">
                <div class="swiper-wrapper latest_blog">
                        @foreach ($hero_blog as $latestBlog)
                            <div class="swiper-slide " id="hero_blog">
                                <a href="{{ route('blog', $latestBlog->id) }}" class="text-decoration-none">
                                    <img src="{{ asset('storage/' . $latestBlog->image) }}" id="hero_images" alt="{{ $latestBlog->title }}">
                                    <p class="lt_title">{{ $latestBlog->title }}</p>
                                </a>
                            </div>
                        @endforeach
                </div>
            </section>
        @endsection
        <div class="row" id="home_div">
            <div class="div1 col-md-9 ">
                @if (Session::has('success'))
                    <p class="text-success">{{ Session::get('success') }}</p>
                @endif

                @foreach ($blogs as $blog)
                    <div class="card m-3 blog-post">
                        <a href="{{ route('blog', $blog->id) }}">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" id="blog_img"
                                alt="{{ $blog->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-decoration-none" id="title">{{ $blog->title }}</h5>
                            <p class="card-text text-decoration-none" id="excerpt">{!! $blog->excerpt !!}</p>
                            <a href="{{ route('blog', $blog->id) }}" id="more">Read more &rarr;</a>
                        </div>
                        <div class="card-footer text-body-secondary text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <b>Category: {{ $blog->category->name }}</b>
                                Date: {{ $blog->created_at }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="div2 col-md-3" id="stick">
                {{-- <div class="card category m-3 ">
                    <div class="card-body latest-blog">
                        <div class="card-head">Latest Blogs</div>
                        @foreach ($latest as $latestBlog)
                            <a href="{{ route('blog', $latestBlog->id) }}" class="text-decoration-none">
                                <img src="{{ asset('storage/' . $latestBlog->image) }}" alt="{{ $latestBlog->title }}"
                                    class="card-img-top" height="120px">
                                <p class="lt_title">{{ $latestBlog->title }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="card category m-3 ">
                    <div class="card-body categories">
                        <div class="card-head">Categories</div>
                        <ol class="list-group list-group-numbered">
                            @foreach ($catwblog as $category)
                                @if ($category->id == $blog->category_id)
                                    <li class="list-group-item d-flex justify-content-between align-items-start ">
                                        <div class="ms-2 me-auto">
                                            <a href="{{ route('blog_with_category', $category->id) }}">
                                                <div>{{ $category->name }}</div>
                                            </a>
                                        </div>
                                        <span class="badge rounded-pill">{{ count($category->blogs) }}</span>
                                    </li>
                                @else
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <a href="{{ route('blog_with_category', $category->id) }}">
                                                <div>{{ $category->name }}</div>
                                            </a>
                                        </div>
                                        <span class="badge rounded-pill">{{ count($category->blogs) }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div> --}}
                <div class="category">
                    <h2>Latest Posts</h2>
                    <div id="blg_wrapper">
                        @foreach ($latest as $latestBlog)
                            <a href="{{ route('blog', $latestBlog->id) }}" class="text-decoration-none">
                                <div id="blg_container">
                                    <img src="{{ asset('storage/' . $latestBlog->image) }}" alt="{{ $latestBlog->title }}"
                                        height="80px">
                                    <div id="cnt_body">
                                        <h3>{{ $latestBlog->title }}</h3>
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($latestBlog->excerpt), 100, '...') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div id="contact_tags">
                    <h2>Categories</h2>
                    <ol>
                        @foreach ($catwblog as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-start" id="cnt_tags">
                                <a href="{{ route('blog_with_category', $category->id) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 4,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            // when window width is <= 640px
            200: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is <= 768px
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            // when window width is <= 1024px
            1100: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            // when window width is <= 1024px
            1400: {
                slidesPerView: 4,
                spaceBetween: 50
            }
        }
    });
</script>

@endsection
