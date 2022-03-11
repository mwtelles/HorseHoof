<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferrador extends Model
{
    use HasFactory;

    protected $table = 'ferradores';

    protected $fillable = [
        'associacao',
        'qualificacao',
        'is_membro_afb'
    ];

    public function user()
    {
        return $this->morphOne('App\Models\User', 'profile');
    }
}
