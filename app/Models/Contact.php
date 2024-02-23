<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    public function scopeNewsletters($query){
        return $query->where([
            ["nom_prenom_c", "==",null],
            ["message","==",null],
            ["compte_id","==",null]
        ]);
    }

    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }
}
