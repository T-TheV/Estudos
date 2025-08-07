# Lista de Exercícios 20: Tópicos Essenciais e Finais 🏆

**Objetivo:** Compreender conceitos-chave como o Service Container e a Injeção de Dependência, aprender o fluxo completo de upload de arquivos e dar os primeiros passos na criação de APIs (Interfaces de Programação de Aplicação) com o Laravel.

**Instruções:**

1.  Continue no projeto `siga-saude`.
2.  Esta lista mistura conceitos de back-end, configuração de servidor e API.

-----

### Exercício 1: Injeção de Dependência na Prática

Você já usa isso sem saber\! Em qualquer método de controller que recebe `(Request $request)`, o Laravel está "injetando" o objeto `Request` para você.

1.  Crie uma classe simples em `app/Services/RelatorioService.php`. Dentro dela, crie um método `public function gerarRelatorioSimples() { return "Relatório gerado em " . now(); }`.
2.  Em um controller, crie um novo método:
    ```php
    use App\Services\RelatorioService; // Importe no topo

    public function gerarRelatorio(RelatorioService $servicoDeRelatorio)
    {
        $relatorio = $servicoDeRelatorio->gerarRelatorioSimples();
        dd($relatorio);
    }
    ```
3.  Crie uma rota para este método e veja como o Laravel cria e fornece o `RelatorioService` automaticamente para você.

### Exercício 2: Configurando Discos de Armazenamento

Antes de fazer uploads, precisamos dizer ao Laravel onde salvar os arquivos.

1.  Abra `config/filesystems.php`.
2.  Observe a seção `disks`. Veja que existem "discos" como `local` e `public`. O disco `public` salva os arquivos em `storage/app/public`. É este que usaremos para arquivos que precisam ser acessíveis pela web.

### Exercício 3: O Link Simbólico de Armazenamento

Arquivos na pasta `storage` não são públicos por padrão. Precisamos criar um "atalho" da sua pasta `public` para lá. No terminal, rode este comando **apenas uma vez** no seu projeto:

```bash
php artisan storage:link
```

Isso cria uma pasta `storage` dentro de `public`, tornando seus arquivos visíveis.

### Exercício 4: Formulário para Upload de Imagem

Modifique o formulário de cadastro de paciente (`pacientes/create.blade.php`).

1.  Adicione o atributo `enctype="multipart/form-data"` à sua tag `<form>`. **Isso é essencial para uploads.**
2.  Adicione um campo para a foto do perfil: `<input type="file" name="foto_perfil">`.

### Exercício 5: Processando o Upload no Controller

No `PacienteController`, no método `store`, adicione a lógica para salvar o arquivo:

```php
if ($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid()) {
    // Salva o arquivo no disco 'public' dentro de uma pasta 'fotos_pacientes'
    // e retorna o caminho do arquivo salvo.
    $caminho = $request->file('foto_perfil')->store('fotos_pacientes', 'public');
    
    // dd($caminho); // Descomente para ver o caminho gerado
}
```

### Exercício 6: Salvando o Caminho no Banco

1.  Crie uma nova migration para adicionar uma coluna `caminho_foto` (string, nullable) à sua tabela `pacientes`. Rode a migration.
2.  No método `store`, após salvar o arquivo no exercício anterior, salve a variável `$caminho` no campo `caminho_foto` do seu novo paciente.

### Exercício 7: Exibindo a Imagem

Na view que mostra os detalhes de um paciente, use o helper `asset()` para exibir a imagem:

```blade
@if($paciente->caminho_foto)
    <img src="{{ asset('storage/' . $paciente->caminho_foto) }}" alt="Foto do Paciente" width="150">
@else
    <p>Paciente sem foto.</p>
@endif
```

### Exercício 8: Sua Primeira Rota de API

Vamos expor nossos dados como JSON.

1.  Abra o arquivo `routes/api.php`.
2.  Adicione uma rota para listar todos os pacientes:
    ```php
    use App\Models\Paciente;

    Route::get('/pacientes', function () {
        return Paciente::all();
    });
    ```
3.  Acesse `http://127.0.0.1:8000/api/pacientes` no seu navegador ou em uma ferramenta como o Postman/Insomnia. Você verá a lista de pacientes em formato JSON.

### Exercício 9: Formatando a Saída da API com Resources

Para controlar exatamente quais dados e como eles são retornados, usamos API Resources.

1.  No terminal: `php artisan make:resource PacienteResource`.
2.  Abra `app/Http/Resources/PacienteResource.php`. Modifique o método `toArray()`:
    ```php
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nome_completo' => $this->nome,
            'idade' => $this->data_nascimento->age, // O Carbon faz a mágica!
            'cpf_formatado' => $this->cpf, // Você poderia adicionar uma função para formatar aqui
        ];
    }
    ```
3.  Na sua rota em `api.php`, use o resource: `return PacienteResource::collection(Paciente::all());`. Veja como a saída JSON mudou.

### Exercício 10: Protegendo uma Rota de API

Assim como o middleware `auth` para web, a API usa o `auth:sanctum`.

1.  Em `routes/api.php`, a rota `/user` já vem protegida por padrão.
    ```php
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    ```
2.  Este exercício é conceitual: entenda que esta rota só pode ser acessada por um usuário autenticado através de um token de API, que seria gerado por um sistema de login de um App Mobile ou Frontend JavaScript.

-----

**Dica Final:** A documentação oficial do Laravel é sua melhor amiga. Ela é clara, bem escrita e tem exemplos para absolutamente tudo. Nenhum curso ou tutorial substitui o hábito de ler a documentação oficial.

