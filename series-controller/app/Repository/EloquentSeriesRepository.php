<?php

namespace App\Repository;

use App\Models\Episodes;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{

    public function add(Request $request): Serie
    {

        DB::beginTransaction();
        $serie = Serie::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasons; $i++) {
            $seasons[] = ["number" => $i, "series_id" => $serie->id];
        }

        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodes; $j++) {
                $episodes[] = ["number" => $j, "season_id" => $season->id];
            }
        }

        Episodes::insert($episodes);
        DB::commit();

        return $serie;
    }
}
