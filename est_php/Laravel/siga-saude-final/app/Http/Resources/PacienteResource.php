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
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
            'idade' => $this->data_nascimento ? \Carbon\Carbon::parse($this->data_nascimento)->age : null,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'created_at' => $this->created_at?->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at?->format('d/m/Y H:i:s'),
            
            // Incluir consultas apenas quando solicitado
            'consultas' => $this->whenLoaded('consultasPaciente', function () {
                return $this->consultasPaciente->map(function ($consulta) {
                    return [
                        'id' => $consulta->id,
                        'data_consulta' => $consulta->data_consulta,
                        'observacoes' => $consulta->observacoes,
                        'status' => $consulta->status ?? 'Agendada',
                    ];
                });
            }),
            
            // Incluir contagem de consultas
            'total_consultas' => $this->whenCounted('consultasPaciente'),
            
            // Links relacionados (HATEOAS)
            'links' => [
                'self' => route('api.pacientes.show', $this->id),
                'consultas' => url("/api/v1/pacientes/{$this->id}/consultas"),
            ],
        ];
    }

    /**
     * Adiciona metadados à resposta quando usado em coleções
     */
    public function with(Request $request): array
    {
        return [
            'meta' => [
                'versao' => '1.0',
                'timestamp' => now()->toISOString(),
            ],
        ];
    }

    /**
     * Customiza o wrapper da resposta
     */
    public static function collection($resource)
    {
        return parent::collection($resource)->additional([
            'meta' => [
                'total_pacientes' => $resource->count(),
                'versao_api' => '1.0',
                'timestamp' => now()->toISOString(),
            ],
        ]);
    }
}
