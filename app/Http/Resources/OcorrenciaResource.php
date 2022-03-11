<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OcorrenciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'    =>  $this->id,
            'nome'  =>  $this->nome,
            'anotacao'  =>  $this->anotacao,
            'estado'  =>  $this->cidade->estado->UF,
            'cidade'  =>  $this->cidade->nome,
            'status'  =>  $this->status,
            'created_at'    =>  $this->created_at->format('d/m/Y'),
            'cavalo'    =>  new CavaloResource($this->cavalo),
            'fotos' =>  OcorrenciaFotoResource::collection($this->fotos),
            'relatorio' =>  $this->relatorio?$this->relatorio->path:null,

        ];
    }
}
