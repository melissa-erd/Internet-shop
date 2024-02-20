@extends('app')

@section('content')

    <h1>Registration</h1>

    <form action="{{route('auth.registration')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="surname" placeholder="surname">
        <input type="text" name="patronymic" placeholder="patronymic">
        <input type="text" name="login" placeholder="login">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="password_repeat" placeholder="password_repeat">
        <input type="checkbox" name="rules" value="Sure">
        <input type="submit">
    </form>

@endsection
