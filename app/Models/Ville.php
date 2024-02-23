<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ville extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected static function booted(){

        static::addGlobalScope('ordered', function (Builder $builder) {
            $builder->orderBy('nom_ville', "ASC");
        });

    }

    public function communes()
    {
        return $this->hasMany(Commune::class);
    }

    public function salles()
    {
        return $this->hasMany(Salle::class);
    }

    public function comptes()
    {
        return $this->belongsToMany(
            Compte::class,
            'info_user_ville',
            'ville_id',
            'info_user_id'
        );
    }
}
