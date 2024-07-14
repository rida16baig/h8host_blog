<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @yield('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Add the logo -->
            <a class="navbar-brand" href="/" id="logo">BiteBrust</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a href="/" class="nav-link">Blogs</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" id="blog_ct"
                                        href="{{ route('blog_with_category', $category->id) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('latest_blogs') }}" class="nav-link">Latest</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('main_section')
    <main>
        @yield('content')
    </main>
    <footer>
        <div>
            <div>
                <a class="navbar-brand" href="/" id="logo">BiteBrust</a>
                <div>
                    <div>
                        <h4>Phone :</h4>
                        <p>0304 6667274</p>
                    </div>
                    <div>
                        <h4>Email :</h4>
                        <a href="mailto:h8host@gmail.com">h8host@gmail.com</a>
                    </div>
                    <div>
                        <h4>Address :</h4>
                        <p>Mian Archade, Ichra main bazar, Mohallah Manzorabad Layyah, 3, Lahore, 05308</p>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ route('home') }}">Blogs</a>
                <a href="{{ route('latest_blogs') }}">Latest</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('signup') }}">Signup</a>
                @auth
                    <a style="color: white; text-decoration:none" href="{{ route('dashboard') }}"
                        class="nav-link">Dashboard</a>
                @endauth
                @auth
                    <a href="{{ route('logout') }}">Logout</a>
                @endauth
            </div>
            <div>
                <a href="https://www.facebook.com/profile.php?id=61557977762832"><img
                        src="{{ asset('images/facebook.png') }}" alt="Facebook"></a>
                <a href="https://www.instagram.com/h8host/"><img src="{{ asset('images/insta.png') }}"
                        alt="Instagram"></a>
                <a href="https://www.linkedin.com/in/h8host/"><img src="{{ asset('images/linkedin.png') }}"
                        alt="Linkedin"></a>
            </div>
        </div>
        <div>
            <p>Copyright &copy; BiteBrust 2024. All rights reserved</p>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('nav.navbar');

            window.addEventListener('scroll', function() {
                if (window.scrollY >= 100) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>
    @yield('script')
</body>

</html>
