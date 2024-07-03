<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Utilisateur extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'prenom',
        'adresse',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
