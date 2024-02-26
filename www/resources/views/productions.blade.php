@extends('app')
@section('content')

    <section class="afisha">
        <button name="new">New</button>
    <div class="afisha-items">
    @foreach($productions as $production)
        <div class="card" style="width: 18rem;">
            <img src="{{ Storage::URL($production->picture) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $production->name }}</h5>
                <p class="card-text">{{ $production->genres()->implode('name',', ') }}</p>
                <p class="card-text">{{ $production->date }}</p>
                <p class="card-text">{{ $production->age }}</p>
                <p class="card-text">{{ $production->price }}</p>
                @guest()
                    <p>If you want to buy a ticket you should to authorize</p>
                @endguest
                @auth()
                    <button class="button"><a href="#" class="button-a">Buy a ticket</a></button>
                @endauth
            </div>
        </div>
    @endforeach
    </div>
    </section>

@endsection
