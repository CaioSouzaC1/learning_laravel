<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticator;
use App\Mail\SeriesCreated;
use App\Models\Serie;
use App\Models\User;
use App\Repository\seriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{

    public function __construct(private seriesRepository $seriesRepository)
    {
        $this->middleware(Authenticator::class);
    }


    public function index(Request $request)
    {

        // return $request->get("id");

        // return redirect("https://google.com");

        Auth::check();

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

        // dd($request->file("cover"));

        $cover_path = $request->file("cover") ? $request->file("cover")->store("series_covers", ["disk" => "public"]) : null;

        $request->merge(["cover_path" => $cover_path]);

        $serie = $this->seriesRepository->add($request);

        $request->session()->put("success.msg", "Serie {$serie->name} was added successfully");

        EventsSeriesCreated::dispatch($serie->name);

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
