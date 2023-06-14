<?php

namespace App\Repository;


use App\Models\Serie;
use Illuminate\Http\Request;

interface SeriesRepository
{
    public function add(Request $request): Serie;
}
