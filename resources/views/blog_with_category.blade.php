@extends('layout')

@section('title', 'Blog with category page')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="div1 col-md-8">
                @if (Session::has('success'))
                    <p class="text-success">{{ Session::get('success') }}</p>
                @endif

                @foreach ($category[0]->blogs as $blog)
                    <div class="card m-3 blog-post">
                        <a href="{{ route('blog', $blog->id) }}">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top"
                                alt="{{ $blog->title }}" height="400px">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-decoration-none">{{ $blog->title }}</h5>
                            <p class="card-text text-decoration-none">{!! $blog->excerpt !!}</p>
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
                <div class="card category m-3 ">
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
                </div>
            </div></div>
    </div>
@endsection
