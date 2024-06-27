<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'description',
        'nombre_place',
        'lieu',
        'photo',
        'date_evenement',
        'date_limite_inscription',
        'association_id',
    ];
    public function association()
    {
        return $this->belongsTo(Association::class);
    }

}
