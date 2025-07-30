# Lista de Exercícios 18: Formulários e Validação ✅

**Objetivo:** Dominar o ciclo de vida de um formulário no Laravel, incluindo a proteção contra ataques (CSRF), o recebimento de dados com o objeto `Request`, a validação das informações com o `Validator` e a exibição de mensagens de erro claras para o usuário.

**Instruções:**

1.  Continue no projeto `siga-saude`.
2.  Vamos trabalhar principalmente nos seus `Controllers` e nas suas views com formulários (`.blade.php`).
3.  Você precisará de um formulário funcional (como o de criar paciente ou consulta) para realizar os exercícios.

-----

### Exercício 1: Proteção CSRF

A primeira e mais importante camada de segurança de um formulário no Laravel.

1.  Em um dos seus formulários (ex: `pacientes/create.blade.php`), adicione a diretiva Blade `@csrf` logo após a tag `<form>`.
2.  Inspecione o código-fonte da página no navegador (Ctrl+U). Você verá que o Laravel adicionou um `input` do tipo `hidden` com um "token". É isso que protege sua aplicação contra ataques de Cross-Site Request Forgery.

### Exercício 2: Recebendo Dados com o Objeto `Request`

No `PacienteController`, no método `store`, mude a assinatura do método para receber o objeto `Request`:

```php
use Illuminate\Http\Request; // Importe no topo da classe

public function store(Request $request)
{
    // Código para ver todos os dados que vieram do formulário
    dd($request->all());
}
```

Preencha e envie seu formulário de cadastro de paciente. `dd()` irá parar a execução e mostrar todos os dados recebidos de forma organizada.

### Exercício 3: Validação Simples e Essencial

No método `store` do seu `PacienteController`, antes do `dd()`, adicione sua primeira validação. Se a validação falhar, o Laravel **automaticamente** redireciona o usuário de volta para o formulário.

```php
public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'cpf' => 'required',
    ]);

    // Se chegar aqui, a validação passou!
    dd('Validação passou!');
}
```

Teste enviando o formulário com os campos em branco.

### Exercício 4: Exibindo Erros de Validação (Geral)

Quando a validação falha, o Laravel envia para a view uma variável `$errors`. No seu formulário (`pacientes/create.blade.php`), adicione este bloco de código no topo para exibir todos os erros:

```blade
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

### Exercício 5: Exibindo Erro por Campo

Para uma melhor experiência do usuário, é bom mostrar o erro logo abaixo do campo correspondente. Abaixo do input de `nome`, adicione:

```blade
@error('nome')
    <span class="text-danger">{{ $message }}</span>
@enderror
```

`$message` é uma variável especial do Blade que contém a mensagem de erro para aquele campo específico.

### Exercício 6: Mantendo os Dados Antigos (`old()`)

É frustrante para o usuário ter que preencher tudo de novo quando um erro acontece. O helper `old()` resolve isso. Modifique seus inputs:

```html
<input type="text" name="nome" value="{{ old('nome') }}">
<input type="text" name="cpf" value="{{ old('cpf') }}">
```

Agora, se a validação falhar, os campos que o usuário já tinha preenchido corretamente continuarão com seus valores.

### Exercício 7: Regras de Validação Avançadas

Vamos turbinar nossa validação no `store` do `PacienteController`:

```php
$request->validate([
    'nome' => 'required|min:3|max:255',
    'cpf' => 'required|size:14|unique:pacientes', // CPF deve ser único na tabela pacientes
    'data_nascimento' => 'required|date|before_or_equal:today',
]);
```

Teste cada uma dessas regras para ver como funcionam.

### Exercício 8: Mensagens de Erro Personalizadas

Você pode sobrescrever as mensagens padrão do Laravel. No `validate()`, passe um segundo array:

```php
$request->validate([
    'nome' => 'required|min:3',
], [
    'nome.required' => 'Por favor, preencha o nome do paciente.',
    'nome.min' => 'O nome precisa ter no mínimo 3 caracteres.',
]);
```

### Exercício 9: Organizando com Form Requests

Para validações complexas, o ideal é criar uma classe separada.

1.  No terminal, rode: `php artisan make:request StorePacienteRequest`.
2.  Abra `app/Http/Requests/StorePacienteRequest.php`.
3.  No método `authorize()`, retorne `true`.
4.  Mova seu array de regras do controller para o método `rules()` desta classe.
5.  No `PacienteController`, mude a assinatura do método `store` para usar sua nova classe:
    ```php
    // Importe a classe no topo
    use App\Http\Requests\StorePacienteRequest;

    public function store(StorePacienteRequest $request) { ... }
    ```
    A validação agora acontece **antes** do código do seu método ser executado. Seu controller fica muito mais limpo.

### Exercício 10: Salvando Dados Validados

Após a validação, é seguro criar o registro. O método `create` do Eloquent funciona perfeitamente com os dados validados.

```php
// No seu método store, após a validação
public function store(StorePacienteRequest $request)
{
    // Pega somente os dados que foram validados pelo Form Request
    $dadosValidados = $request->validated();

    // Cria o paciente no banco
    Paciente::create($dadosValidados);

    // Redireciona para a lista de pacientes com uma mensagem de sucesso
    return redirect()->route('pacientes.index')->with('sucesso', 'Paciente cadastrado com sucesso!');
}
```

*(Para a mensagem de sucesso funcionar, você precisará exibi-la na view `pacientes.index`)*.

-----

**Dica:** A documentação do Laravel tem uma lista com **todas as regras de validação disponíveis**. É uma página que você manterá nos seus favoritos. Sempre que pensar "como eu valido X?", a resposta estará lá.
