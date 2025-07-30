
# Lista de Exercícios 03: Migrations e Eloquent ORM 🗄️

**Objetivo:** Aprender a criar e manipular tabelas no banco de dados usando migrations e o Eloquent ORM do Laravel.

**Instruções:**
1. Crie uma pasta chamada `lista03` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Teste as funcionalidades acessando `http://localhost:8000`.

---


### Exercício 1: Migration de Usuários
No terminal, execute:
`php artisan make:migration create_usuarios_table --create=usuarios`
Adicione campos como `nome`, `email`, `password` na migration.

### Exercício 2: Executando Migrations
Execute:
`php artisan migrate`
Verifique no banco (phpMyAdmin ou SQLite) se a tabela foi criada.

### Exercício 3: Model Eloquent
Crie o model:
`php artisan make:model Usuario`
No model, defina os campos preenchíveis (`protected $fillable = [...]`).

### Exercício 4: Inserindo Registros
No controller ou tinker, insira:
```php
Usuario::create(['nome' => 'João', 'email' => 'joao@email.com', 'password' => bcrypt('123456')]);
```

### Exercício 5: Listando Usuários
No controller:
```php
$usuarios = Usuario::all();
return view('usuarios', compact('usuarios'));
```
Na view, exiba com `@foreach`.

### Exercício 6: Atualizando Registros
Atualize:
```php
$usuario = Usuario::find(1);
$usuario->nome = 'Maria';
$usuario->save();
```

### Exercício 7: Excluindo Registros
Exclua:
```php
Usuario::destroy(1);
```

### Exercício 8: Timestamps Automáticos
Garanta que a migration tem `timestamps()`. Verifique se os campos `created_at` e `updated_at` são preenchidos automaticamente.

### Exercício 9: Relacionamento One to Many
No model Usuario:
```php
public function posts() {
    return $this->hasMany(Post::class);
}
```
No model Post, defina o inverso.

### Exercício 10: Conceito de Eloquent ORM
Explique: O Eloquent ORM permite manipular dados do banco usando objetos PHP, facilitando consultas, inserções e relacionamentos de forma intuitiva e segura.

---

**Dica:** O Eloquent facilita o trabalho com banco de dados usando uma abordagem orientada a objetos. Consulte a documentação oficial para exemplos avançados: https://laravel.com/docs/eloquent
