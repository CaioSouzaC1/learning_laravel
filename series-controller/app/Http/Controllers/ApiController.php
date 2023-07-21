<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello World!'
        ]);
    }

    public function store(Request $request)
    {

        return response()->json([
            'message' => 'i cant create a serie'
        ]);
    }

    public function show(int $id)
    {

        return Serie::whereID($id)->with("seasons.episodes")->first();
    }

    public function update(int $id, Request $request)
    {

        $serie = Serie::find($id);

        $serie->fill($request->all());

        $serie->save();

        return $serie;
    }

    public function destroy($id)
    {
        Serie::destroy($id);
        return response()->noContent();
    }
}
