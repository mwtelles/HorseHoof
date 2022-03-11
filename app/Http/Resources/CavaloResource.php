<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CavaloResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'apelido' => $this->apelido,
            'sexo' => $this->sexo,
            'idade' => $this->idade,
            'raca'  =>  $this->raca->nome
        ];
    }
}
