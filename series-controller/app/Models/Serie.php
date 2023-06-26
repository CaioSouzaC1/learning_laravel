<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = ['name', "cover_path"];

    public function seasons()
    {

        return $this->hasMany(Season::class, 'series_id');
    }

    protected static function booteed()
    {

        self::addGlobalScope('ordered', function (Builder $builder) {
            $builder->orderBy('name', 'desc');
        });
    }
}
