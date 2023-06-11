<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        // return $request->get("id");

        // return redirect("https://google.com");

        $series = Serie::all();

        $success_msg = $request->session()->get("success.msg");
        $request->session()->forget("success.msg");


        return view("series.index", [
            'series' => $series
        ])->with("success_msg", $success_msg);
    }

    public function create(Request $request)
    {
        $request->session()->put("success.msg", "Serie added successfully");

        return view("series.create");
    }

    public function store(Request $request)
    {

        $serie = Serie::create($request->all());

        $request->session()->put("success.msg", "Serie {$serie->name} was added successfully");

        return redirect('/series');
    }

    public function destroy(Request $request)
    {

        Serie::destroy($request->id);

        $request->session()->put("success.msg", "Serie deleted successfully");

        return redirect("/series");
    }

    public function update(Request $request)
    {
        Serie::where("id", $request->id)
            ->update(["name" => $request->name]);

        $request->session()->put("success.msg", "Serie updated successfully");


        return redirect("/series");
    }

    public function edit(Request $request)
    {
        return view("series.edit")->with("id", $request->id);
    }
}
