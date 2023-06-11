<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espisodes extends Model
{
    use HasFactory;

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
