<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/style.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
<body>
<div class="wrapper">
    <header>
        <nav>
            <ul class="nav-ul">
                <li>
                    <img class="logo" src="./images/logo.png" alt="">
                </li>
            </ul>
            <ul class="nav-ul">
                <li><a class="link" href="#">About us</a></li>
                <li><a class="link" href="#">Afisha</a></li>
                <li><a class="link" href="#">Where are we?</a></li>
            </ul>
            <ul class="nav-ul">
                @guest()
                <li>
                    <button class="button"><a class="button-a" href="/login">Login</a></button>
                </li>
                <li>
                    <button class="button"><a class="button-a" href="/registration">Registration</a></button>
                </li>
                @endguest
                @auth
                    <li>
                        <button class="button"><a class="button-a" href="{{ route("logout") }}">Logout</a></button>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>
@section('content')
@show
</div>
</body>
</html>
