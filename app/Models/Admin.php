<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use HasFactory , HasRoles;
    protected $fillable = [
        'prenom',
        'permissions',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
