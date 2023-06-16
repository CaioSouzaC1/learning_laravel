<?php

namespace App\Http\Controllers;

use App\Models\Episodes;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{

    public function index(Season $season, Request $request)
    {
        // $request->session()->forget("success.msg");

        return view("episodes.index")->with("episodes", $season->episodes);
    }

    public function update(Request $request, Season $season)
    {

        $eps = $request->episodes;

        DB::beginTransaction();

        try {

            Episodes::whereIn('id', $eps)->update(['watched' => true]);
            Episodes::where('season_id', $season->id)
                ->whereNotIn('id', $eps)
                ->update(['watched' => false]);

            DB::commit();

            return redirect()->back()->with('success.msg', 'Episodes successfully updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('An error occurred while updating episodes.');
        }
    }
}
