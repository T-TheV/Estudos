<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'telefone'];
    protected $casts = [
        'data_nascimento' => 'date',
    ];
    use SoftDeletes;
    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}

