<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/app.css">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="col-md-offset-1 col-md-10">
        <div class="content">
            <h1 style="text-align:center;margin-bottom:10vh;"> KMA Media Purchasing Portal</h1>
            <p class="intro-para">Valued KMA Media Partner,<br><br>
                Our Media Purchasing Portal has been designed with you in mind to facilitate an efficient purchasing
                process with features including:
            <ul class="feature-list m-b-md">
                <li class="feature-list-item">Secure vendor login to your personal account via HTTPS/SSL
                    connection.
                </li>
                <li class="feature-list-item">The assurance that your proposal will be received by KMA.</li>
                <li class="feature-list-item">Fast review and reply</li>
            </ul>
            </p>
            <div style="text-align:center;">
                <a  href="/register" class="btn btn-primary">Get Started  &gt;</a>
            </div>

            <div class="links" style="text-align:center; padding-top:30px;">
                <a style="padding:10px 15px;" href="https://keriganmarketing.com">Main Site</a>
                <a style="padding:10px 15px;" href="https://keriganmarketing.com/portfolio/">Our Work</a>
                <a style="padding:10px 15px;" href="https://keriganmarketing.com/freelunch/">News</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
