<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/style.css" type="text/css" />
    </head>
<body>
<div class="wrapper">
    <header>
        <nav>
            <ul>
                <li>
                    <img class="logo" src="./images/logo.png" alt="">
                </li>
            </ul>
            <ul class="nav-ul">
                <li><a class="nav-a" href="#">About us</a></li>
                <li><a class="nav-a" href="#">Afisha</a></li>
                <li><a class="nav-a" href="#">Where are we?</a></li>
            </ul>
            <ul class="nav-ul">
                <li>
                    <button class="button"><a class="button-a" href="/login">Login</a></button>
                </li>
                <li>
                    <button class="button"><a class="button-a" href="/registration">Registration</a></button>
                </li>
            </ul>
        </nav>
    </header>
@section('content')
@show
</div>
</body>
</html>
