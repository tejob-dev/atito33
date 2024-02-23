<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compte extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function quartiers()
    {
        return $this->belongsToMany(
            Quartier::class,
            'info_user_quartier',
            'info_user_id'
        );
    }

    public function villes()
    {
        return $this->belongsToMany(
            Ville::class,
            'info_user_ville',
            'info_user_id'
        );
    }

    public function salles()
    {
        return $this->belongsToMany(
            Salle::class,
            'info_user_salle',
            'info_user_id'
        );
    }
}
