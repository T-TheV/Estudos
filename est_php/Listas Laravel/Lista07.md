
# Lista de Exercícios 07: Relacionamentos Avançados e Eloquent 🔗

**Objetivo:** Aprender sobre relacionamentos avançados no Eloquent ORM, modelando relações entre tabelas e otimizando consultas.

**Instruções:**
1. Crie uma pasta chamada `lista07` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Teste as funcionalidades acessando `http://localhost:8000`.

---


### Exercício 1: Many to Many
Crie migrations para `usuarios`, `grupos` e uma tabela pivot `grupo_usuario`. No model, defina:
```php
public function grupos() {
    return $this->belongsToMany(Grupo::class);
}
```

### Exercício 2: Tabelas Pivot
Adicione campos extras na migration da pivot, como `data_entrada`. Acesse via `$usuario->grupos()->withPivot('data_entrada')`.

### Exercício 3: belongsToMany
No model Grupo, defina:
```php
public function usuarios() {
    return $this->belongsToMany(Usuario::class);
}
```

### Exercício 4: Consultas com Filtros
Busque usuários de um grupo específico:
```php
$grupo = Grupo::find(1);
$usuarios = $grupo->usuarios()->where('ativo', true)->get();
```

### Exercício 5: HasOne e HasManyThrough
No model Usuario:
```php
public function perfil() {
    return $this->hasOne(Perfil::class);
}
public function posts() {
    return $this->hasManyThrough(Post::class, Grupo::class);
}
```

### Exercício 6: Eager Loading
No controller:
```php
$usuarios = Usuario::with('grupos')->get();
```
Compare o desempenho com e sem eager loading.

### Exercício 7: Factories
Crie com:
`php artisan make:factory UsuarioFactory`
Use em seeders ou testes para gerar dados fictícios.

### Exercício 8: Seeders
Crie com:
`php artisan make:seeder UsuarioSeeder`
Popule o banco com dados iniciais usando factories.

### Exercício 9: Soft Deletes
No model, adicione:
```php
use Illuminate\Database\Eloquent\SoftDeletes;
```
Na migration, adicione `softDeletes()`. Teste exclusão lógica e recuperação.

### Exercício 10: Tipos de Relacionamento
Explique: Eloquent oferece One to One, One to Many, Many to Many, Has Many Through e Polymorphic. Cada um modela diferentes cenários de banco de dados.

---

**Dica:** Relacionamentos bem definidos facilitam consultas eficientes e integridade dos dados. Consulte a documentação oficial para exemplos avançados: https://laravel.com/docs/eloquent-relationships
