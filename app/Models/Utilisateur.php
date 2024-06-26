<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

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
