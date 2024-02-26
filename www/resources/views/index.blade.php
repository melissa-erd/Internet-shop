@extends('app')

@section('content')

{{--    <section class="about">--}}
{{--        <div class="slogan">--}}
{{--            <img class="logo" src="./images/logo.png" alt="">--}}
{{--            <p>Nash deviz 4 slova: Teatr "Omega" - eto klevo!</p>--}}
{{--        </div>--}}

{{--            <div id="carouselExampleFade" class="carousel slide carousel-fade">--}}
{{--                <div class="carousel-inner">--}}
{{--                    @foreach($productions as $production)--}}
{{--                    <div class="carousel-item active">--}}
{{--                        <img src="{{ Storage::URL($production->picture) }}" class="d-block w-50" alt="...">--}}
{{--                        <p>{{ $production->name }}</p>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">--}}
{{--                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                    <span class="visually-hidden">Previous</span>--}}
{{--                </button>--}}
{{--                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">--}}
{{--                    <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                    <span class="visually-hidden">Next</span>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--    </section>--}}

    <section class="afisha">
        <div class="afisha-items">
            @foreach($productions->take(4) as $production)
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::URL($production->picture) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $production->name }}</h5>
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
        <div class="afisha-link">
            <a class="link" href="/all-productions">See all productions</a>
        </div>
    </section>

@endsection
