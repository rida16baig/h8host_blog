@extends('layout')
@section('title', 'Latest Blogs')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/latest.css') }}">
@endsection
@section('content')
    <section>
        <div class="container col-md-8 mt-5 mb-5">
            <div class=" category m-3 ">
                <h1 id="latest_blg">Latest Blogs</h1>
                <div id="blg_wrapper">
                    @foreach ($latest_blogs as $latestBlog)
                        <a href="{{ route('blog', $latestBlog->id) }}" class="text-decoration-none">
                            <div id="blg_container">
                                <img src="{{ asset('storage/' . $latestBlog->image) }}" alt="{{ $latestBlog->title }}"
                                width="150px" height="200px" >
                                <div>
                                    <h3 class="lt_title">{{ $latestBlog->title }}</h3>
                                    <p>{!! $latestBlog->excerpt !!}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
