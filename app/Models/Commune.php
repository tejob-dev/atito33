<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commune extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected static function booted(){

        static::addGlobalScope('ordered', function (Builder $builder) {
            $builder->orderBy('nom_commune', "ASC");
        });

    }

    public function quartiers()
    {
        return $this->hasMany(Quartier::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function salles()
    {
        return $this->hasMany(Salle::class);
    }
}
