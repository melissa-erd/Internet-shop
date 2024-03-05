@extends('app')
@section('content')

    <section>
        <div class="sort-filter">
            <div class="dropdown">
                <button class="button dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <a class="button-a">Sort</a>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route("productions")}}?date=old">Snachala blizhayshie</a></li>
                    <li><a class="dropdown-item" href="{{route("productions")}}?date=new">Snachala pozdnie</a></li>
                    <li><a class="dropdown-item" href="{{ route('productions') }}?name=alphabet">A-Z</a></li>
                    <li><a class="dropdown-item" href="{{ route('productions') }}?age=ageToHigh">Age</a></li>
                </ul>
            </div>
            <div>
                <form class="filter" action="">
                    <select class="form-select" aria-label="Default select example" name="genres[]">
                        <option hidden="" value="">Select genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    <button class="button button-a">Search</button>
                </form>
            </div>
        </div>


    <div class="afisha-items">
    @foreach($productions as $production)
        <div class="card" style="width: 18rem;">
            <img src="{{ Storage::URL($production->picture) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $production->name }}</h5>
                <p class="card-text">Show date: {{ $production->date }}</p>
                <p class="card-text">Genre: {{ $production->genres()->implode('name',', ') }}</p>
                <p class="card-text">Price: {{ $production->price }}₽</p>
                <p class="card-text">{{ $production->age }} +</p>
                @guest()
                    <div class="card">
                        <div class="card-body">
                            If you want to buy a ticket you should to authorize
                        </div>
                    </div>
{{--                    <p>If you want to buy a ticket you should to authorize</p>--}}
                @endguest

                @auth()
                    <div class="add_subtract">
                        <form action="{{ route('basket.add') }}" method="post">
                            @csrf
                            <input type="hidden" name="production_id" value="{{ $production->id }}">
                            <input class="button btn-add-subtract" type="submit" value="+">
                        </form>
                            @if($production->baskets->first())
                                <p class="count">{{ $production->baskets->first()->pivot->count }}</p>
                            @endif
                        @if(!is_null($production->baskets->first()))
                            <form action="{{ route('basket.subtract') }}" method="post">
                                @csrf
                                <input type="hidden" name="production_id" value="{{ $production->id }}">
                                <input class="button btn-add-subtract" type="submit" value="-">
                            </form>
                        @endif
                    </div>


{{--                    <button class="button"><a href="#" class="button-a">Buy a ticket</a></button>--}}
                @endauth
            </div>
        </div>
    @endforeach
    </div>
    </section>

@endsection
