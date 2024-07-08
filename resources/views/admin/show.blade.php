
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">

@extends('layout')

@section('title', 'dashboard ')



@section('content')
    <div class="container mt-5 main-box">
        <div class="row">
            <div class="col-6 mb-3 box">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blogs</h5>
                        <p class="card-text">All Blog Related Routes</p>
                        <ul class="list-group list-group-flush ul">
                            <li class="list-group-item"><a href="{{ Route('create_blog') }}">Create Blog</a></li>
                            <li class="list-group-item"><a href="{{ Route('all_blog') }}">All Blog Posts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 box">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">All Categories Related Routes</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ Route('create_category') }}">Create Category</a></li>
                            <li class="list-group-item"><a href="{{ Route('all_category') }}">All Category</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection