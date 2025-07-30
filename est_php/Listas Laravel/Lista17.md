# Lista de Exercícios 17: Eloquent ORM - Relacionamentos 🔗

**Objetivo:** Aprender a definir e utilizar os relacionamentos do Eloquent para conectar seus models. O foco principal será nos relacionamentos mais comuns: `hasMany` (tem muitos) e `belongsTo` (pertence a).

**Instruções:**

1.  Continue no projeto `siga-saude`.
2.  Vamos trabalhar principalmente com os models `Paciente` e `Consulta`.
3.  O `php artisan tinker` continua sendo uma ferramenta excelente para testar os relacionamentos rapidamente.

-----

### Exercício 1: Criando o Model de Consulta

Se você ainda não o criou, gere o Model para a sua tabela `consultas`:

```bash
php artisan make:model Consulta
```

Abra `app/Models/Consulta.php` e adicione a propriedade `$fillable` para permitir a criação em massa:

```php
protected $fillable = ['paciente_id', 'data_consulta', 'status'];
```

### Exercício 2: O Relacionamento `hasMany` (Um-para-Muitos)

Um paciente pode ter muitas consultas. Vamos definir isso.
No seu model `app/Models/Paciente.php`, adicione o seguinte método:

```php
public function consultas()
{
    return $this->hasMany(Consulta::class);
}
```

Este método define que um `Paciente` "tem muitas" `Consultas`.

### Exercício 3: O Relacionamento `belongsTo` (Pertence a)

Uma consulta pertence a um único paciente. Vamos definir o inverso do relacionamento.
No seu model `app/Models/Consulta.php`, adicione este método:

```php
public function paciente()
{
    return $this->belongsTo(Paciente::class);
}
```

### Exercício 4: Acessando Relacionamentos (A "Mágica")

1.  Use o `php artisan tinker`.
2.  Encontre um paciente: `$paciente = App\Models\Paciente::find(1);`.
3.  Agora, acesse todas as consultas dele como se fosse uma propriedade: `$consultas = $paciente->consultas;`.
4.  Use `dd($consultas);` para ver o resultado. O Laravel automaticamente buscou no banco todas as consultas relacionadas a esse paciente\!

### Exercício 5: Acessando o Inverso

1.  Ainda no `tinker`, encontre uma consulta: `$consulta = App\Models\Consulta::find(1);` (se não houver, crie uma manualmente no phpMyAdmin para testar).
2.  Acesse o paciente dono dessa consulta: `$paciente = $consulta->paciente;`.
3.  Use `dd($paciente);` para ver os dados do paciente.

### Exercício 6: Criando um Registro Relacionado

Vamos agendar uma nova consulta para um paciente existente. No `tinker`:

```php
$paciente = App\Models\Paciente::find(3);

// Use o método do relacionamento para criar e já associar a consulta!
$paciente->consultas()->create([
    'data_consulta' => '2025-08-15 10:00:00',
    'status' => 'Agendada'
]);
```

O Laravel preenche o `paciente_id` automaticamente. Verifique no banco de dados.

### Exercício 7: Exibindo Dados Relacionados na View

No seu `PacienteController`, no método `show($id)`, busque o paciente e passe-o para a view. Na view `pacientes.show.blade.php` (crie se não existir), exiba os dados do paciente e, em seguida, faça um loop para listar suas consultas:

```blade
<h3>Consultas Agendadas:</h3>
<ul>
    @forelse($paciente->consultas as $consulta)
        <li>
            Consulta em {{ $consulta->data_consulta }} - Status: {{ $consulta->status }}
        </li>
    @empty
        <p>Nenhuma consulta agendada para este paciente.</p>
    @endforelse
</ul>
```

### Exercício 8: Eager Loading (Carregamento Otimizado)

Quando você lista muitos pacientes e as consultas de cada um, pode gerar muitas consultas ao banco (o problema N+1). O Eager Loading resolve isso.
No `PacienteController`, no método `index()`, altere a busca para:

```php
$pacientes = Paciente::with('consultas')->get();
```

Isso busca todos os pacientes e todas as suas consultas em apenas **duas** queries ao banco, em vez de uma para cada paciente. É muito mais performático.

### Exercício 9: Contando Registros Relacionados

Crie uma rota de teste para exibir o nome de cada paciente e a quantidade de consultas que ele tem, sem carregar as consultas inteiras.

```php
$pacientes = Paciente::withCount('consultas')->get();

foreach ($pacientes as $paciente) {
    echo $paciente->nome . ' - ' . $paciente->consultas_count . ' consultas<br>';
}
```

### Exercício 10: Consultando com Base no Relacionamento

Vamos encontrar todos os pacientes que têm pelo menos uma consulta agendada. Use o método `has()`:

```php
// No tinker ou em uma rota de teste
$pacientesComConsultas = App\Models\Paciente::has('consultas')->get();
dd($pacientesComConsultas);
```

Para encontrar pacientes que tenham pelo menos 3 consultas, por exemplo:
`App\Models\Paciente::has('consultas', '>=', 3)->get();`

-----

**Dica:** A nomenclatura é muito importante para o Eloquent funcionar "magicamente". O nome do método do relacionamento (`consultas`, `paciente`) deve ser o nome do model relacionado (no singular ou plural). A chave estrangeira na tabela (`paciente_id`) deve ser o nome do model no singular + `_id`. Seguir essas convenções economiza muita configuração.

