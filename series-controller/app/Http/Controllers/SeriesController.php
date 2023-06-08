<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        // return $request->get("id");

        // return redirect("https://google.com");

        return view("SeriesIndex", [
            'series' => ["Naruto", "HXH", "DBZ"]
        ]);
    }
}
