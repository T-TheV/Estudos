# Lista de Exercícios 15: Migrations e Seeders 🏗️

**Objetivo:** Aprender a usar as **Migrations** para criar e modificar a estrutura do seu banco de dados de forma versionada (como o Git) e a usar **Seeders** e **Factories** para popular seu banco com dados de teste de forma rápida e automatizada.

**Instruções:**

1.  Continue no projeto `siga-saude`.
2.  Você precisará configurar a conexão com o banco de dados no arquivo `.env`.
3.  O terminal e o Artisan serão suas principais ferramentas.

-----

### Exercício 1: Configurando a Conexão com o Banco

1.  Abra seu arquivo `.env`.
2.  Encontre as variáveis de banco de dados (`DB_*`).
3.  Configure-as para o seu ambiente local. Para o XAMPP padrão, geralmente é assim:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_estudos_php  // O banco que criamos no PHP puro
    DB_USERNAME=root
    DB_PASSWORD=
    ```
4.  **Importante:** Se você já tem tabelas antigas no `db_estudos_php`, apague-as para começar do zero com o Laravel.

### Exercício 2: Entendendo as Migrations Padrão

O Laravel já vem com algumas migrations. Olhe a pasta `database/migrations`. Você verá arquivos para criar as tabelas `users`, `password_reset_tokens`, etc. Abra o arquivo `..._create_users_table.php` e analise a estrutura: o método `up()` constrói e o método `down()` destrói.

### Exercício 3: Rodando as Migrations

No terminal, execute o comando para rodar todas as migrations pendentes e criar as tabelas no seu banco de dados:

```bash
php artisan migrate
```

Abra o phpMyAdmin e confirme que as tabelas (`users`, `migrations`, etc.) foram criadas.

### Exercício 4: Criando a Migration de Pacientes

Agora, vamos criar a migration para a nossa tabela `pacientes`. No terminal, rode:

```bash
php artisan make:migration create_pacientes_table --create=pacientes
```

Abra o novo arquivo em `database/migrations`. Dentro do método `up()`, use o "Schema Builder" do Laravel para definir as colunas da tabela:

```php
Schema::create('pacientes', function (Blueprint $table) {
    $table->id(); // Equivalente a INT AUTO_INCREMENT PRIMARY KEY
    $table->string('nome', 100);
    $table->string('cpf', 14)->unique();
    $table->date('data_nascimento');
    $table->string('telefone', 20)->nullable(); // ->nullable() torna a coluna opcional
    $table->timestamps(); // Cria as colunas created_at e updated_at
});
```

Rode `php artisan migrate` novamente para criar a tabela.

### Exercício 5: Criando a Migration de Consultas

Crie a migration para a tabela `consultas`:

```bash
php artisan make:migration create_consultas_table --create=consultas
```

Defina as colunas no método `up()`, incluindo a chave estrangeira:

```php
Schema::create('consultas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
    $table->dateTime('data_consulta');
    $table->string('status', 20)->default('Agendada');
    $table->timestamps();
});
```

Rode `php artisan migrate`.

### Exercício 6: Revertendo Migrations

O comando `migrate:rollback` desfaz a última "leva" de migrations executadas. Rode no terminal:

```bash
php artisan migrate:rollback
```

Verifique no phpMyAdmin que as tabelas `pacientes` e `consultas` foram apagadas. Agora, rode `php artisan migrate` de novo para recriá-las. Isso mostra o poder de versionamento.

### Exercício 7: Criando uma Factory de Pacientes

Factories servem para gerar dados falsos. Vamos criar uma para `Paciente`:

```bash
php artisan make:factory PacienteFactory --model=Paciente
```

(O Laravel pode perguntar se você quer criar o Model `Paciente`. Diga que sim). Abra `database/factories/PacienteFactory.php` e defina a estrutura dos dados falsos:

```php
public function definition(): array
{
    return [
        'nome' => $this->faker->name(),
        'cpf' => $this->faker->unique()->numerify('###.###.###-##'),
        'data_nascimento' => $this->faker->date(),
        'telefone' => $this->faker->phoneNumber(),
    ];
}
```

### Exercício 8: Criando um Seeder de Pacientes

Seeders são classes que usam as factories para inserir os dados. Crie um seeder para pacientes:

```bash
php artisan make:seeder PacienteSeeder
```

Abra `database/seeders/PacienteSeeder.php` e no método `run()`, use a factory para criar 50 pacientes:

```php
public function run(): void
{
    \App\Models\Paciente::factory(50)->create();
}
```

### Exercício 9: Rodando o Seeder

Para rodar seu seeder específico, use o comando:

```bash
php artisan db:seed --class=PacienteSeeder
```

Verifique a tabela `pacientes` no phpMyAdmin. Ela deve estar populada com 50 pacientes falsos\!

### Exercício 10: O Comando `migrate:fresh`

Este comando é extremamente útil durante o desenvolvimento. Ele apaga **todas** as tabelas e roda **todas** as migrations novamente do zero.

```bash
php artisan migrate:fresh
```

Para também rodar todos os seeders principais depois, use a flag `--seed`:

```bash
php artisan migrate:fresh --seed
```

(Para que o `--seed` funcione, você precisa registrar seu `PacienteSeeder` no arquivo `DatabaseSeeder.php`).

-----

**Dica:** Nunca edite um arquivo de migration depois que ele já foi rodado e enviado para outros desenvolvedores (ou para produção). Se precisar alterar uma tabela que já existe, crie uma **nova** migration para isso (ex: `php artisan make:migration add_coluna_x_to_pacientes_table --table=pacientes`).

