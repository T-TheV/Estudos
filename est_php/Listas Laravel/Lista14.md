# Lista de Exercícios 14: Controllers e o Padrão MVC 👨‍💻

**Objetivo:** Aprender a organizar a lógica da sua aplicação em classes `Controller`, tirando a responsabilidade do arquivo de rotas. Entender como criar controllers, mapear rotas para seus métodos e utilizar `resource controllers` para agilizar o desenvolvimento de CRUDs.

**Instruções:**

1.  Continue trabalhando no projeto `siga-saude`.
2.  Você usará bastante o Artisan para criar arquivos.
3.  O foco será mover a lógica de `routes/web.php` para novos arquivos em `app/Http/Controllers/`.

-----

### Exercício 1: Criando seu Primeiro Controller

No terminal, na raiz do seu projeto, execute o comando Artisan para criar um controller para gerenciar os pacientes:

```bash
php artisan make:controller PacienteController
```

Abra o arquivo recém-criado em `app/Http/Controllers/PacienteController.php` para ver sua estrutura.

### Exercício 2: Refatorando a Rota de Listagem (`index`)

1.  Dentro da classe `PacienteController`, crie um método público chamado `index`.
2.  Mova toda a lógica que você tinha na sua rota `GET /pacientes` para dentro deste método. O método deve retornar a view da lista de pacientes.
3.  Em `routes/web.php`, importe a classe no topo (`use App\Http\Controllers\PacienteController;`) e altere a definição da rota para:
    ```php
    Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
    ```

### Exercício 3: Refatorando a Rota de Detalhes (`show`)

1.  Em `PacienteController`, crie um novo método `public function show($id)`.
2.  Mova a lógica da sua rota `GET /pacientes/{id}` para este método. O parâmetro `$id` será injetado automaticamente pelo Laravel.
3.  Em `routes/web.php`, altere a rota correspondente para:
    ```php
    Route::get('/pacientes/{id}', [PacienteController::class, 'show'])->name('pacientes.show');
    ```

### Exercício 4: Gerando um Controller de Recurso (Resource)

Para funcionalidades de CRUD, o Laravel oferece um atalho. Crie um controller para `Consultas` já com todos os métodos padrão de um CRUD:

```bash
php artisan make:controller ConsultaController --resource
```

Abra o arquivo e observe os métodos criados: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`.

### Exercício 5: Mapeando uma Rota de Recurso

No seu arquivo `routes/web.php`, você pode criar todas as rotas para o CRUD de consultas com uma única linha. Adicione:

```php
use App\Http\Controllers\ConsultaController; // Adicione no topo

Route::resource('consultas', ConsultaController::class);
```

Para ver a "mágica", vá ao terminal e rode `php artisan route:list`. Veja quantas rotas foram criadas e nomeadas automaticamente para você\!

### Exercício 6: Implementando o `create`

No `ConsultaController`, encontre o método `create()`. Faça com que ele retorne uma view chamada `consultas.create`. Crie o arquivo `resources/views/consultas/create.blade.php` com um formulário HTML simples para agendar uma nova consulta.

### Exercício 7: Implementando o `store`

O método `store()` é responsável por receber os dados do formulário `create`.

1.  No formulário de `create.blade.php`, aponte a `action` para `{{ route('consultas.store') }}` e use `method="POST"`.
2.  No `ConsultaController`, no método `store(Request $request)`, adicione o código `dd($request->all());`. (`dd` significa "die and dump").
3.  Preencha e envie o formulário. Você verá todos os dados que o Laravel recebeu, provando que a rota e o controller estão funcionando.

### Exercício 8: O Helper `route()` com Parâmetros

Na sua view que lista todos os pacientes (`pacientes.index.blade.php`), adicione um link "Ver Detalhes" para cada paciente. Em vez de escrever a URL na mão, use o helper `route()` que você nomeou no exercício 3:

```blade
<a href="{{ route('pacientes.show', ['id' => $paciente['id']]) }}">Ver Detalhes</a>
```

Isso torna seu código mais robusto a mudanças de URL.

### Exercício 9: Página de Contato

Crie um novo controller `ContatoController` com o comando `make:controller`. Crie um método `index` nele que retorna uma view `contato.blade.php`. Crie a view e a rota `GET /contato` para apontar para este novo método.

### Exercício 10: Refatorando a Rota Principal

Até a rota da página inicial pode (e deve) estar em um controller.

1.  Crie um `DashboardController` (`php artisan make:controller DashboardController`).
2.  Crie um método `index` nele e mova a lógica da sua rota `/` para lá.
3.  Atualize a rota `/` em `routes/web.php` para apontar para `[DashboardController::class, 'index']`.

-----

**Dica:** A principal responsabilidade de um **Controller** é ser um "maestro". Ele recebe uma requisição, pede ao **Model** (que veremos a seguir) os dados necessários, e entrega esses dados para a **View** correta. Mantenha seus controllers focados nisso e evite colocar regras de negócio complexas dentro deles.

