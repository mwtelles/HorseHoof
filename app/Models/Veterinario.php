<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;

    protected $fillable = [
        'tempo_no_mercado',
        'especializacao',
        'is_estudante'
    ];

    public function user()
    {
        return $this->morphOne('App\Models\User', 'profile');
    }
}
