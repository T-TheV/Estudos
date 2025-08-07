<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome_completo' => $this->nome,
            'idade' => $this->data_nascimento->age, // O Carbon faz a mágica!
            'cpf_formatado' => $this->cpf, // Você poderia adicionar uma função para formatar aqui
        ];
    }
}
