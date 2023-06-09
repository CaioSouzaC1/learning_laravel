<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        // return $request->get("id");

        // return redirect("https://google.com");

        $series = Serie::all();

        return view("series.index", [
            'series' => $series
        ]);
    }

    public function create()
    {
        return view("series.create");
    }

    public function store(Request $request)
    {

        $serieName = $request->get("name");
        $serie = new Serie();
        $serie->name = $serieName;
        $serie->save();

        redirect('/series');
    }
}
