@extends('app')

@section('content')

<section class="registration">
    <div class="background">
        <p>Registration</p>
        <div class="container-form">
            <form class="form-register" action="{{ route('auth.registration') }}" method="post">
                @csrf
                <input class="input" type="text" name="name" placeholder="name">
                <input class="input" type="text" name="surname" placeholder="surname">
                <input class="input" type="text" name="patronymic" placeholder="patronymic">
                <input class="input" type="text" name="login" placeholder="login">
                <input class="input" type="email" name="email" placeholder="email">
                <input class="input" type="password" name="password" placeholder="password">
                <input class="input" type="password" name="password_repeat" placeholder="password_repeat">
                <label class="p-checkbox" for="rules">Sure</label>
                <input type="checkbox" id="rules" name="rules" required>
                <input class="button" value="Sign up" type="submit">
            </form>
        </div>
    </div>
</section>


@endsection
