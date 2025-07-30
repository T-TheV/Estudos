
# Lista de Exercícios 02: Rotas, Controllers e Views 🛣️

**Objetivo:** Aprender a criar rotas, controllers e views no Laravel, entendendo o fluxo de dados entre eles e boas práticas de organização.

**Instruções:**
1. Crie uma pasta chamada `lista02` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Teste as rotas e funcionalidades acessando `http://localhost:8000`.

---


### Exercício 1: Rotas GET e POST
No arquivo `routes/web.php`, crie:
```php
Route::get('/form', function() {
    return view('form');
});
Route::post('/form', function(Request $request) {
    return 'Dados recebidos: ' . $request->input('nome');
});
```
Teste acessando `/form` e enviando dados.

### Exercício 2: Formulário Blade
Crie `resources/views/form.blade.php` com:
```blade
<form method="POST" action="{{ route('form') }}">
    @csrf
    <input type="text" name="nome" placeholder="Seu nome">
    <button type="submit">Enviar</button>
</form>
```

### Exercício 3: Recebendo Dados no Controller
Crie um controller com `php artisan make:controller FormController`. No método, receba os dados e envie para uma view:
```php
public function receber(Request $request) {
    $nome = $request->input('nome');
    return view('resultado', compact('nome'));
}
```

### Exercício 4: Validação de Dados
No controller, valide:
```php
$request->validate(['nome' => 'required|min:3']);
```
Teste com dados inválidos e veja o resultado.

### Exercício 5: Mensagens de Erro
Na view, exiba erros:
```blade
@error('nome')
    <div class="erro">{{ $message }}</div>
@enderror
```

### Exercício 6: Redirecionamento
Após o envio, redirecione:
```php
return redirect()->route('form')->with('success', 'Dados enviados!');
```
Exiba a mensagem na view com `session('success')`.

### Exercício 7: Rotas com Parâmetros
No `web.php`:
```php
Route::get('/usuario/{id?}', function($id = null) {
    return 'ID: ' . ($id ?? 'Não informado');
});
```

### Exercício 8: Helper route()
Na view, gere URLs:
```blade
<a href="{{ route('form') }}">Ir para o formulário</a>
```

### Exercício 9: Grupos de Rotas
No `web.php`:
```php
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/dashboard', ...);
});
```

### Exercício 10: Diferença entre Rotas Web e API
Explique: Rotas web usam controllers/views e session, rotas API retornam JSON e são stateless, definidas em `routes/api.php`.

---

**Dica:** Use o comando `php artisan route:list` para visualizar todas as rotas do seu projeto e entender como estão organizadas. Consulte a documentação oficial para exemplos avançados: https://laravel.com/docs/routing
