<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Association extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = [
        'adresse',
        'description',
        'ninea',
        'date_creation',
        'secteur_activite',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
