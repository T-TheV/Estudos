# Lista de Exercícios 16: Eloquent ORM - Básico 🪄

**Objetivo:** Aprender a criar Models do Eloquent para representar suas tabelas e a usar seus métodos para realizar operações de CRUD (Create, Read, Update, Delete) de forma fluida e intuitiva, abandonando quase que por completo a escrita de SQL manual.

**Instruções:**

1.  Continue no projeto `siga-saude`.
2.  O foco será criar arquivos na pasta `app/Models/` e usar esses models dentro dos seus `Controllers`.
3.  Use o comando `php artisan tinker` no terminal para testar rapidamente seus models sem precisar criar rotas e views.

-----

### Exercício 1: Criando o Model de Paciente

Se você não o criou na lista anterior, crie o Model para a sua tabela `pacientes`. No terminal, rode:

```bash
php artisan make:model Paciente
```

Abra o arquivo `app/Models/Paciente.php`. Observe que ele está quase vazio. O Laravel, por convenção, já sabe que este model representa a tabela `pacientes` (o plural do nome da classe).

### Exercício 2: Listando Todos os Pacientes com Eloquent

No seu `PacienteController`, no método `index()`, substitua qualquer lógica de banco de dados que você tinha por esta linha:

```php
$pacientes = Paciente::all();
```

Passe a variável `$pacientes` para a sua view. O resultado deve ser o mesmo, mas seu código ficou drasticamente mais limpo.

### Exercício 3: Buscando um Paciente por ID

No `PacienteController`, no método `show($id)`, substitua a lógica de busca por:

```php
$paciente = Paciente::findOrFail($id);
```

O `findOrFail()` é ótimo porque ele busca o paciente ou, se não encontrar, automaticamente gera uma página de erro 404 (Não Encontrado).

### Exercício 4: Consultas com `where`

Crie uma nova rota de teste ou use o `php artisan tinker`. Execute o seguinte código para encontrar todos os pacientes com um nome específico e veja o resultado:

```php
$pacientes = Paciente::where('nome', 'Maria Souza')->get();
dd($pacientes);
```

*(Lembre-se que o nome precisa existir nos seus dados semeados)*.

### Exercício 5: Criando um Novo Paciente (Método 1)

No `php artisan tinker`, crie um novo paciente da seguinte forma:

```php
$novoPaciente = new App\Models\Paciente;
$novoPaciente->nome = 'Ana Carolina';
$novoPaciente->cpf = '111.222.333-44';
$novoPaciente->data_nascimento = '1990-05-15';
$novoPaciente->telefone = '(84) 99999-8888';
$novoPaciente->save(); // Esta linha salva no banco!
```

Verifique no phpMyAdmin se o novo paciente foi inserido.

### Exercício 6: Mass Assignment e a Propriedade `$fillable`

O método `create()` é mais rápido, mas exige uma configuração de segurança.

1.  No seu model `app/Models/Paciente.php`, adicione a propriedade `$fillable` para dizer ao Laravel quais campos podem ser preenchidos em massa:
    ```php
    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'telefone'];
    ```
2.  Agora, no `tinker`, você pode criar um paciente em uma única linha:
    ```php
    App\Models\Paciente::create([
        'nome' => 'Pedro Henrique',
        'cpf' => '555.666.777-88',
        'data_nascimento' => '1985-11-20'
    ]);
    ```

### Exercício 7: Atualizando um Paciente

No `tinker`, encontre um paciente, altere uma propriedade e salve:

```php
$paciente = App\Models\Paciente::find(1); // Encontra o paciente com ID 1
$paciente->telefone = '(84) 91234-5678';
$paciente->save();
```

Verifique no banco que o telefone foi atualizado.

### Exercício 8: Deletando um Paciente

Ainda no `tinker`, encontre e delete um paciente:

```php
$paciente = App\Models\Paciente::find(2); // Encontra o paciente com ID 2
$paciente->delete();
```

Confirme no banco que o registro foi removido.

### Exercício 9: Soft Deletes (Lixeira) - Parte 1 (Migration)

Soft Deletes permitem "apagar" um registro sem removê-lo do banco.

1.  Crie uma nova migration para adicionar a coluna de "lixeira" à tabela de pacientes:
    ```bash
    php artisan make:migration add_deleted_at_to_pacientes_table --table=pacientes
    ```
2.  No arquivo da migration, adicione a coluna no método `up()` e a remoção no `down()`:
    ```php
    // up()
    $table->softDeletes();

    // down()
    $table->dropSoftDeletes();
    ```
3.  Rode `php artisan migrate`.

### Exercício 10: Soft Deletes (Lixeira) - Parte 2 (Model)

Para habilitar o comportamento de Soft Delete no seu model:

1.  Abra `app/Models/Paciente.php`.
2.  Importe o Trait no topo: `use Illuminate\Database\Eloquent\SoftDeletes;`.
3.  Use o Trait dentro da classe: `use SoftDeletes;`.
4.  Agora, quando você rodar `$paciente->delete()`, o Eloquent não vai apagar a linha, mas sim preencher a coluna `deleted_at`. E, por padrão, o `Paciente::all()` **não** mostrará mais os registros que estão na lixeira\!

-----

**Dica:** O `php artisan tinker` é seu laboratório. Use-o para testar qualquer comando do Eloquent rapidamente. Para sair do tinker, digite `exit`.

