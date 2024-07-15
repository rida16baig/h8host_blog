@extends('layout')
@section('title', 'Contact')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection
@section('content')
    <div class="container mt-5">
        @if (Session::has('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>
    <div class="contact row">
        <section id="form" class="container col-md-8 mt-5 mb-5">
            <h1 class="text-center">Contact Us</h1>
            <p class="text-center">Feel free to contact us for any need!</p>
            <form action="{{ route('contact') }}" method="POST">
                @method('Post')
                @csrf
                <div class="input-group">
                    <input type="text" name="name" placeholder="Name">
                    <input type="email" name="email" placeholder="Email">
                    <input type="text" name="subject" placeholder="Subject">
                </div>
                <div class="textarea-group">
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                </div>
                <input type="submit" value="Send" id="submit">
            </form>
            {{-- <div class="address">
                <div>
                    <h4>Address</h4>
                    <p>Mian Archade, Ichra main bazar, Mohallah Manzorabad Layyah, 3, Lahore, 05308</p>
                </div>
                <div>
                    <h4>Phone</h4>
                    <p>0304 6667274</p>
                </div>
                <div>
                    <h4>Email</h4>
                    <a href="mailto:h8host@gmail.com">h8host@gmail.com</a>
                </div>
            </div> --}}
        </section>
        <div class="col-md-4 mt-5 mb-5">
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
                <h2>Tags</h2>
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
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3400.739343664887!2d74.31575067614126!3d31.53131824660018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919052f6f26593d%3A0x77e07ce93045a74d!2sh8host!5e0!3m2!1sen!2s!4v1720703302912!5m2!1sen!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
