<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Production;
use App\Models\User;
use App\Services\BasketService;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $productions = Production::query()->orderByDesc('id')->get();
        return view('index', compact('productions'));
    }

    public function productions(Request $request, BasketService $basketService)
    {
        $productions = Production::all();

        if ($user = auth()->user()) {
            $productions = Production::query()->with('baskets')->with([
                'baskets' => function (Builder $builder) use ($user, $basketService) {
                    $builder->where('baskets.id', $basketService->resolve($user)->id);
                }
            ]);
        }

        $productions = $productions->orderByDesc('id')->get();
        $genres = Genre::all();

        if ($request->date === "old") {
            $productions = Production::query()->orderBy('date')->get();
        }

        if ($request->date === 'new') {
            $productions = Production::query()->orderByDesc('date')->get();
        }

        if ($request->name === 'alphabet') {
            $productions = Production::query()->orderBy('name')->get();
        }

        if ($request->age === 'ageToHigh') {
            $productions = Production::query()->orderBy('age')->get();
        }
//        if (isset($request->genres)) {
//            $genres->whereRelation('genres', 'id', $request->genres);
//        }
        return view('productions', compact('productions', 'genres'));
    }

}
