<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/united/bootstrap.min.css" rel="stylesheet" integrity="sha256-nKQVXFJ5JtDJlI5p1UcSf0JOFudCj9RgjBDsJSZPsS4= sha512-dbadXecsBCgqQ5XGx6SG+bO4vsfzznX6/NfAG4CuzLi76wcdLGAw2KIcsLyv7H5XsEGq0zaznpxDCAEIX9pdYA==" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">


    </head>
    <body>

        @if(Session::has('flash_message'))
            <div class='flash_message'>
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <header>

            <h2>Projects &#38 Tasks</h1>

            @if(Auth::check())
            <p id='user_name'>{{ Auth::user()->name }}'s Home Page</p>
            @endif
        <nav>
            <ul>
                @if(Auth::check())
                    <li><a href='/projects'> Home</a></li>
                    <li><a href='/projects/new'> Add Project </a></li>
                    @yield('extra_navigation')
                    <li><a href='/logout'> Logout </a></li>
                @else
                    <li><a href='/login'>Log in</a></li>
                    <li><a href='/register'>Register</a></li>
                @endif
            </ul>
        </nav>
        @if(count($errors) > 0)
            <ul>
        @foreach ($errors->all() as $error)
            <li id='error'>{{ $error }}</li>
        @endforeach
        </ul>
        @endif
        </header>
        <div class="main">
            @yield('content')
        </div>
    </body>
</html>
