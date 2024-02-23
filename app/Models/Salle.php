<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salle extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date_salle' => 'datetime',
    ];

    protected static function booted(){

        static::addGlobalScope('validated', function (Builder $builder) {
            if(auth()->user()){
                if(auth()->user()->hasRole("super-admin") == false){
                    $builder->where('validated', true);
                }
            }else{
                $builder->where('validated', true);
            }

        });

    }

    public function scopePromote($query){
        return $query->where("promoted", true);
    }
    
    public function scopeBurocowork($query){
        return $query->with("typeSalles")->whereHas("typeSalles", function($query){
            $query->where("libelle", "like", "%bureau%")->orWhere("libelle", "like", "%cowork%");
        });
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function quartier()
    {
        return $this->belongsTo(Quartier::class);
    }

    public function visites()
    {
        return $this->hasMany(Visite::class);
    }

    public function photosSalles()
    {
        return $this->belongsToMany(PhotosSalle::class);
    }

    public function typeSalles()
    {
        return $this->belongsToMany(TypeSalle::class);
    }

    public function videoSalles()
    {
        return $this->belongsToMany(VideoSalle::class);
    }

    public function comptes()
    {
        return $this->belongsToMany(
            Compte::class,
            'info_user_salle',
            'salle_id',
            'info_user_id'
        );
    }

    public function comodites()
    {
        return $this->belongsToMany(Comodite::class);
    }
}
