<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Alunos extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        return [
            "aluno_id" => $this->aluno_id,
            "nome" => $this->nome,
            "email" => $this->email,
            "cpf" => $this->cpf,
            "rg" => $this->rg,
            "telefone" => $this->telefone,
            "celular" => $this->celular,
            "telefone" => $this->telefone
        ];
        
        
    }
}
