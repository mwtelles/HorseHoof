<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;

    protected $fillable = ['nome','anotacao','cidade_id','user_id','cavalo_id','status'];
    protected $appends = ['span_status'];

    public function cavalo(){
        return $this->belongsTo(Cavalo::class);
    }

    public function cidade(){
        return $this->belongsTo(Cidade::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fotos(){
        return $this->hasMany(OcorrenciaFoto::class,'ocorrencia_id');
    }
    public function relatorio(){
        return $this->hasOne(OcorrenciaRelatorio::class,'ocorrencia_id');
    }

    public function getCreatedAtDiffAttribute()
    {
        \Carbon\Carbon::setLocale('pt_BR');
        return $this->created_at->diffForHumans();
    }

    public function getSpanStatusAttribute(){
        switch ($this->status){
            case 0:
                return '<span class="text-info font-weight-semibold">Pendente</span>';
            case 1:
                return '<span class="text-success font-weight-semibold">Respondido</span>';
            case 2:
                return '<span class="text-danger font-weight-semibold">Rejeitado</span>';
        }
    }
}
