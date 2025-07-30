# Lista de Exercícios 12: Rotas e Views 🛣️

**Objetivo:** Aprender a definir as URLs (rotas) da sua aplicação, criar as páginas visuais (views) com o básico do Blade, e passar dados do back-end para o front-end.

**Instruções:**

1.  Continue trabalhando dentro do seu projeto `siga-saude`.
2.  O arquivo principal para este módulo será o `routes/web.php`.
3.  As views serão criadas dentro da pasta `resources/views/`.
4.  Mantenha o servidor Artisan (`php artisan serve`) rodando para testar suas rotas no navegador.

-----

### Exercício 1: Sua Primeira View

1.  Em `resources/views/`, crie um novo arquivo chamado `boasvindas.blade.php`.
2.  Dentro dele, escreva um HTML simples, como `<h1>Bem-vindo ao SIGA-SAÚDE!</h1>`.
3.  Em `routes/web.php`, modifique a rota principal (`/`) para que ela retorne esta view.
    ```php
    Route::get('/', function () {
        return view('boasvindas'); // Não precisa do .blade.php
    });
    ```
4.  Acesse `http://127.0.0.1:8000` e veja sua nova página.

### Exercício 2: Rota para Pacientes

Crie uma nova rota `/pacientes` que retorne uma view chamada `pacientes.blade.php`. A view deve conter um título como `<h2>Lista de Pacientes</h2>`.

### Exercício 3: Passando Dados para a View

1.  Na rota `/pacientes` que você criou, defina uma variável com um nome de paciente.
2.  Passe essa variável para a view usando o segundo argumento da função `view()`.
    ```php
    Route::get('/pacientes', function () {
        $nomePaciente = 'João da Silva';
        return view('pacientes', ['nome' => $nomePaciente]);
    });
    ```
3.  No arquivo `pacientes.blade.php`, exiba o nome usando a sintaxe do Blade: `Olá, {{ $nome }}`.

### Exercício 4: Rota com Parâmetro Obrigatório

Crie uma rota `/pacientes/{id}` que capture um ID da URL. A função da rota deve receber o `$id` como parâmetro e retornar a mensagem "Exibindo detalhes do paciente com ID: [id]".

  * Teste acessando `/pacientes/1`, `/pacientes/123`, etc.

### Exercício 5: Rota com Parâmetro Opcional

Crie uma rota `/pesquisar` que possa receber um termo de busca opcional.

1.  Defina a rota como `Route::get('/pesquisar/{termo?}', ...)`
2.  Na função, o parâmetro deve ter um valor padrão: `function ($termo = null) { ... }`.
3.  Se o `$termo` for fornecido, exiba "Buscando por: [termo]". Se não, exiba "Digite um termo para pesquisar.".

<!-- end list -->

  * Teste acessando `/pesquisar/` e `/pesquisar/consultas`.

### Exercício 6: Nomeando Rotas

Nomear rotas é uma boa prática. Modifique a rota do exercício 2 para dar um nome a ela.

```php
Route::get('/pacientes', function () {
    // ...
})->name('pacientes.index');
```

A vantagem é que agora você pode gerar URLs para esta rota em suas views sem se preocupar em mudar o link em todos os lugares se a URL mudar.

### Exercício 7: Rota para JSON (API Simples)

Crie uma rota `/api/pacientes` que, em vez de retornar uma view, retorne um array de pacientes diretamente. O Laravel irá convertê-lo automaticamente para JSON.

```php
Route::get('/api/pacientes', function () {
    return [
        ['id' => 1, 'nome' => 'Maria Souza'],
        ['id' => 2, 'nome' => 'Carlos Pereira']
    ];
});
```

Acesse no navegador para ver o resultado. Isso é a base para criar APIs.

### Exercício 8: Rota de Redirecionamento

Crie uma rota `/home` que simplesmente redireciona o usuário para a rota principal (`/`). Use a função `redirect()`.

```php
Route::get('/home', function () {
    return redirect('/');
});
```

### Exercício 9: Organizando com Grupos de Rotas

Quando se tem muitas rotas relacionadas, é bom agrupá-las. Crie um grupo para as rotas de agendamento.

```php
Route::prefix('agendamentos')->group(function () {
    Route::get('/', function () {
        return 'Lista de agendamentos';
    });
    Route::get('/novo', function () {
        return 'Formulário para novo agendamento';
    });
});
```

  * Agora teste acessando `/agendamentos` e `/agendamentos/novo`.

### Exercício 10: Passando um Array para a View

1.  Na sua rota `/pacientes` (exercício 2), em vez de uma única variável, crie um array de pacientes (pode ser um array de arrays associativos).
2.  Passe este array para a view `pacientes.blade.php`.
3.  Na view, use a diretiva `@foreach` do Blade para percorrer o array e exibir o nome de cada paciente em uma lista (`<ul>` e `<li>`).

-----

**Dica:** O arquivo `routes/web.php` é para as rotas da sua aplicação web (que retornam HTML). O arquivo `routes/api.php` é para rotas de API (que retornam JSON). O Laravel aplica configurações diferentes para cada um, como a proteção de rotas. Por enquanto, focaremos no `web.php`.

