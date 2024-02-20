@extends('app')

@section('content')

    <h1>Login</h1>

    <form action="" method="post">
        @csrf
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" placeholder="password">
        <input type="submit">
    </form>

@endsection
