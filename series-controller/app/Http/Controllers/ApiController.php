<?php

namespace App\Http\Controllers;

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

        return Series::whereID($id)->with("seasons.episodes")->first();
    }
}
