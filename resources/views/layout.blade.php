<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            transition: cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        a#blog_ct:hover {
            background-color: var(--black-color);
            color: var(--white-color);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-3">
        <div class="w-100">
            <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex justify-content-center align-items-center w-100">
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
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="navbarDropdownItem">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" id="blog_ct"
                                        href="{{ route('blog_with_category', $category->id) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Latest</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="p-3">
        @yield('content')
    </main>
    <footer>
        <div>
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item ">
                            <a style="color: white; text-decoration:none" href="{{ route('dashboard') }}"
                                class="nav-link">Dashboard</a>
                        </li>
                    @endauth
                </ul>
                @auth
                    <a href="{{ route('logout') }}">Logout</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('signup') }}">Signup</a>
                @endguest
            </div>
            <div>
                <a href="{{ route('home') }}">Blogs</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>
            <div>
                <a href="#">fb</a>
                <a href="#">insta</a>
                <a href="#">linkedin</a>
            </div>

        </div>
        <div>
            <p>All rights reserved @ 2024</p>
        </div>
    </footer>
</body>

</html>
