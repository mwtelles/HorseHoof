<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OcorrenciaRelatorio extends Model
{
    use HasFactory;

    protected $fillable = ['ocorrencia_id','path'];

    public function ocorrencia(){
        return $this->belongsTo(Ocorrencia::class);
    }
}
