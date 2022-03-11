<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OcorrenciaFoto extends Model
{
    use HasFactory;

    protected $fillable = ['path','ocorrencia_id','type','pata'];
}
