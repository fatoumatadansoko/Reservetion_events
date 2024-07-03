<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'statut',
        'evenement_id',
        'utilisateur_id',

    ];
<<<<<<< HEAD
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
=======
    public function utilisateur()
    {
        return $this->hasMany(Utilisateur::class);
>>>>>>> 2be11a2cadbb9e3aa6dadd87315210faa0379538
    }
}
