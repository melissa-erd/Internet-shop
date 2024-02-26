<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Production;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $productions = Production::query()->orderByDesc('id')->get();
        return view('index', compact('productions'));
    }

    public function productions()
    {
        $productions = Production::query()->orderByDesc('id')->get();
        $genres = Genre::all();


//        if (isset($request->new))
//        {
//            $productions = Production::query()->orderByDesc('date')->get();
//        }

        return view('productions', compact('productions', 'genres'));
    }
}
