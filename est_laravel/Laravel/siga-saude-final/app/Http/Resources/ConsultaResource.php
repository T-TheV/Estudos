<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultaResource extends JsonResource
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
            'data_consulta' => $this->data_consulta?->format('d/m/Y H:i'),
            'observacoes' => $this->observacoes,
            'status' => $this->status ?? 'Agendada',
            'created_at' => $this->created_at?->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at?->format('d/m/Y H:i:s'),
            
            // Relacionamentos
            'paciente' => $this->whenLoaded('paciente', function () {
                return [
                    'id' => $this->paciente->id,
                    'nome' => $this->paciente->nome,
                    'cpf' => $this->paciente->cpf,
                ];
            }),
            
            'medico' => $this->whenLoaded('medico', function () {
                return [
                    'id' => $this->medico->id,
                    'name' => $this->medico->name,
                    'email' => $this->medico->email,
                ];
            }),
            
            // Links HATEOAS
            'links' => [
                'self' => route('api.consultas.show', $this->id),
                'paciente' => route('api.pacientes.show', $this->paciente_id),
            ],
        ];
    }
}
