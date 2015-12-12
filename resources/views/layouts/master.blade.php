<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css" rel="stylesheet" integrity="sha256-Ay17X/itZzhUFkDfLB9MICE7tbVwtPuFhcwDpABdbEA= sha512-eTtl6Aa3v8DrTCYWH7cAfXt6QW8DpsFn0hdCcYIWe6VDMyPMikXBWd/9bZR5YZNrmHBBu4KGdVgfPs1aEEgVIw==" crossorigin="anonymous"></head>
        <link rel="stylesheet" href="css/style.css">



    </head>
    <body>
            @if(count($errors) > 0)
                <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
            @endif
        @if(Session::has('flash_message'))
            <div class='flash_message'>
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <header>
            <h1>Projects and Tasks</h1>
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
        </header>
        <div class="main">
            @yield('content')
        </div>
    </body>
</html>
