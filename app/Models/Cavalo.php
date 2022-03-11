<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cavalo extends Model
{
    use HasFactory;

    protected $fillable = ['apelido','sexo','idade','cavalo_raca_id'];


    public function ocorrencia(){
        return $this->belongsToMany(Ocorrencia::class);
    }

    public function raca(){
        return $this->belongsTo(CavaloRaca::class,'cavalo_raca_id');
    }

    public function scopeMachos($query){
        return $query->where('sexo','M');
    }

    public function scopeFemeas($query){
        return $query->where('sexo','F');
    }
}
