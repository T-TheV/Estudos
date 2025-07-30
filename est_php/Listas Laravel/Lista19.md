# Lista de Exercícios 19: Middleware e Autenticação 🔐

**Objetivo:** Implementar um sistema completo de autenticação (login, registro, logout) de forma rápida usando o Laravel Breeze e aprender a proteger rotas com `Middleware`, tanto para usuários logados quanto para diferentes níveis de acesso (papéis/roles).

**Instruções:**

1.  Continue no projeto `siga-saude`.
2.  Esta lista envolve a instalação de um pacote e a compilação de assets, então siga os comandos do terminal cuidadosamente.

-----

### Exercício 1: Instalando o Laravel Breeze

Breeze é um "kit de início" oficial do Laravel que cria todo o sistema de autenticação para você em minutos.

1.  No terminal, na pasta do seu projeto, rode: `composer require laravel/breeze --dev`.
2.  Quando terminar, rode: `php artisan breeze:install`. O instalador fará algumas perguntas. Escolha a opção **Blade** e siga as instruções.
3.  Ao final, o Breeze pedirá para você rodar `npm install && npm run dev`. Faça isso. (Se não tiver o NPM, instale o Node.js).
4.  Por fim, rode as migrations para criar as tabelas de usuários: `php artisan migrate`.

### Exercício 2: Explorando o Novo Sistema

Acesse sua aplicação no navegador. Você verá links para "Log in" e "Register" no canto superior direito.

1.  Clique em "Register" e crie uma nova conta.
2.  Após o registro, você será redirecionado para uma página `/dashboard`.
3.  Faça o logout.
4.  Explore os arquivos que o Breeze criou: as novas views em `resources/views/auth/`, os controllers em `app/Http/Controllers/Auth/` e o novo arquivo de rotas `routes/auth.php`.

### Exercício 3: Protegendo Suas Rotas

Agora que temos um sistema de login, vamos proteger o acesso à área de pacientes.

1.  Em `routes/web.php`, envolva suas rotas de `pacientes` e `consultas` com o middleware de autenticação:
    ```php
    Route::middleware(['auth'])->group(function () {
        Route::resource('pacientes', PacienteController::class);
        Route::resource('consultas', ConsultaController::class);
        // Coloque aqui qualquer outra rota que precise de login
    });
    ```
2.  Faça logout e tente acessar `/pacientes`. O Laravel deve te redirecionar automaticamente para a página de login.

### Exercício 4: Menus Condicionais com `@auth` e `@guest`

O Breeze já fez isso, mas seu trabalho é entender.

1.  Abra a view `resources/views/layouts/navigation.blade.php`.
2.  Encontre as diretivas Blade `@auth` e `@guest`.
3.  Observe como o link para o "Dashboard" e o menu de "Logout" só aparecem dentro do `@auth`, enquanto os links de "Log in" e "Register" só aparecem no `@guest`.

### Exercício 5: Acessando o Usuário Logado

No seu `DashboardController`, no método `index`, você pode descobrir quem é o usuário logado.

```php
use Illuminate\Support\Facades\Auth; // Importe no topo

public function index()
{
    $usuario = Auth::user(); // Pega o objeto User completo
    $nomeUsuario = $usuario->name;
    
    // dd("Bem-vindo(a), " . $nomeUsuario);
    return view('dashboard', ['nomeDoUsuario' => $nomeUsuario]);
}
```

Passe o nome para a view `dashboard.blade.php` e exiba uma mensagem de boas-vindas personalizada.

### Exercício 6: Adicionando Papel (Role) ao Usuário

Vamos preparar o terreno para ter diferentes tipos de usuário (ex: admin, medico).

1.  Crie uma nova migration: `php artisan make:migration add_tipo_to_users_table --table=users`.
2.  No arquivo da migration, adicione a coluna `tipo`:
    ```php
    $table->string('tipo')->default('recepcionista'); // Nossos papéis: 'admin', 'medico', 'recepcionista'
    ```
3.  Rode `php artisan migrate`.
4.  No model `app/Models/User.php`, adicione `'tipo'` à propriedade `$fillable`.

### Exercício 7: Criando um Middleware de Papel

Agora, o "segurança" da nossa aplicação.

1.  Crie o middleware: `php artisan make:middleware ChecarPapel`.
2.  Abra `app/Http/Middleware/ChecarPapel.php`. Modifique o método `handle` para aceitar um papel e verificar se o usuário o possui:
    ```php
    public function handle(Request $request, Closure $next, string $papel)
    {
        if ($request->user()->tipo !== $papel) {
            abort(403, 'ACESSO NEGADO'); // Erro "Forbidden"
        }
        return $next($request);
    }
    ```

### Exercício 8: Registrando o Middleware

Para poder usar o middleware nas rotas, precisamos dar um "apelido" a ele.

1.  Abra `app/Http/Kernel.php`.
2.  Dentro do array `$middlewareAliases` (em versões mais antigas, pode ser `$routeMiddleware`), adicione:
    ```php
    'papel' => \App\Http\Middleware\ChecarPapel::class,
    ```

### Exercício 9: Usando o Middleware de Papel

Em `routes/web.php`, crie uma rota que só possa ser acessada por administradores:

```php
Route::middleware(['auth', 'papel:admin'])->group(function () {
    Route::get('/admin/painel', function () {
        return 'Bem-vindo ao Painel do Administrador!';
    })->name('admin.painel');
});
```

Vá ao seu banco de dados, mude manualmente o `tipo` do seu usuário para `admin` e tente acessar `/admin/painel`. Depois, mude de volta para `recepcionista` e tente de novo.

### Exercício 10: Protegendo um CRUD Inteiro

Vamos supor que apenas administradores podem criar, editar ou deletar outros usuários. Proteja o CRUD de usuários com o seu novo middleware.

```php
Route::middleware(['auth', 'papel:admin'])->group(function () {
    // Aqui você colocaria o Route::resource para gerenciar usuários, por exemplo.
    // Route::resource('usuarios', UsuarioController::class);
});
```

Este é um padrão muito comum para áreas administrativas.

-----

**Dica:** Middleware é um conceito poderoso que age como "camadas de uma cebola". Uma requisição vinda do navegador passa por cada middleware definido na rota, um por um. Se qualquer um deles barrar a requisição (como o `auth` ou o nosso `papel`), ela nem chega ao Controller.

