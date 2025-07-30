# Lista de Exercícios 13: Blade - O Motor de Templates 🍃

**Objetivo:** Dominar as funcionalidades do Blade para criar layouts reutilizáveis, incluir seções de conteúdo dinâmico, usar estruturas de controle como loops e condicionais, e organizar suas views de forma profissional.

**Instruções:**

1.  Continue trabalhando no projeto `siga-saude`.
2.  Todos os arquivos para esta lista serão criados ou modificados dentro da pasta `resources/views/`.

-----

### Exercício 1: Criando o Layout Principal

1.  Crie uma nova pasta em `resources/views/` chamada `layouts`.
2.  Dentro de `layouts`, crie um arquivo `app.blade.php`. Este será seu template mestre.
3.  Coloque nele uma estrutura HTML5 básica (com `<html>`, `<head>`, `<body>`, etc.).
4.  No lugar onde o conteúdo principal da página deve entrar, adicione a diretiva: `@yield('content')`.

### Exercício 2: Estendendo o Layout

1.  Modifique sua view `resources/views/boasvindas.blade.php`.
2.  No topo do arquivo, adicione `@extends('layouts.app')`.
3.  Envolva todo o conteúdo da página com a diretiva `@section`:
    ```blade
    @section('content')
        <h1>Bem-vindo ao SIGA-SAÚDE!</h1>
        <p>Seu sistema de gestão de saúde.</p>
    @endsection
    ```
4.  Acesse a rota principal (`/`) e veja que o conteúdo de `boasvindas.blade.php` agora é exibido dentro do seu layout `app.blade.php`.

### Exercício 3: Títulos de Página Dinâmicos

1.  No seu layout `layouts/app.blade.php`, dentro da tag `<title>`, coloque: `<title>@yield('titulo') - SIGA-SAÚDE</title>`.
2.  Agora, em `boasvindas.blade.php`, adicione uma nova seção para o título: `@section('titulo', 'Página Inicial')`.
3.  Faça o mesmo para sua view de pacientes (`pacientes.blade.php`), definindo o título como "Lista de Pacientes". Acesse as duas páginas e veja o título da aba do navegador mudar.

### Exercício 4: Incluindo Partials (Partes Reutilizáveis)

1.  Crie uma pasta `resources/views/partials`.
2.  Dentro dela, crie um arquivo `_navbar.blade.php`. (O `_` é uma convenção para indicar que é um arquivo parcial).
3.  Coloque um menu de navegação simples no navbar, com links para a Home (`/`) e para Pacientes (`/pacientes`).
4.  No seu layout principal (`layouts/app.blade.php`), dentro do `<body>`, inclua o navbar com: `@include('partials._navbar')`.

### Exercício 5: Condicionais com `@if`

1.  Em uma rota, passe uma variável booleana para uma view: `return view('minha-view', ['logado' => true]);`.
2.  Na view, use as diretivas `@if`, `@else` e `@endif` para exibir uma mensagem diferente se o usuário está logado ou não.
    ```blade
    @if($logado)
        <p>Bem-vindo, usuário!</p>
    @else
        <p>Você não está logado.</p>
    @endif
    ```

### Exercício 6: Exibindo HTML sem Escapar (Cuidado\!)

1.  Em uma rota, passe uma variável com uma tag HTML: `$dado = "<strong>Importante!</strong>";`.
2.  Na view, exiba esta variável de duas formas:
      * Com `{{ $dado }}` (o padrão, seguro).
      * Com `{!! $dado !!}` (não seguro, interpreta o HTML).
3.  Observe a diferença e entenda por que `{!! !!}` só deve ser usado com dados 100% confiáveis.

### Exercício 7: Loops com `@forelse`

O `@forelse` é um `foreach` que já vem com uma verificação de array vazio.

1.  Passe um array de `procedimentos` para uma view. Primeiro, passe um array com itens. Depois, passe um array vazio `[]`.
2.  Use a diretiva `@forelse` para listar os procedimentos.
    ```blade
    <ul>
        @forelse($procedimentos as $p)
            <li>{{ $p }}</li>
        @empty
            <p>Nenhum procedimento cadastrado.</p>
        @endforelse
    </ul>
    ```

### Exercício 8: A Variável `$loop`

Dentro de um loop `foreach` ou `forelse`, o Blade te dá uma variável mágica `$loop`.

1.  Dentro de um loop de pacientes, use `{{ $loop->iteration }}` para exibir o número da linha (1, 2, 3...).
2.  Use `@if($loop->first)` para aplicar um estilo CSS ou uma classe diferente apenas ao primeiro item da lista.

### Exercício 9: Componentes Blade

O Laravel permite criar componentes reutilizáveis.

1.  No terminal, rode: `php artisan make:component Alert`.
2.  Isso criará dois arquivos. Vá para `resources/views/components/alert.blade.php`.
3.  Coloque nele uma estrutura de alerta, por exemplo: `<div class="alerta-erro">{{ $slot }}</div>`. `$slot` é onde o conteúdo será injetado.
4.  Agora, em qualquer outra view, você pode chamar seu componente: `<x-alert>Ocorreu um erro ao processar sua solicitação.</x-alert>`.

### Exercício 10: Props de Componentes

Vamos melhorar o componente de alerta.

1.  Modifique a classe do componente (`app/View/Components/Alert.php`) para aceitar um tipo (ex: 'sucesso', 'erro').
2.  Modifique a view do componente (`alert.blade.php`) para mudar a classe CSS com base no tipo.
3.  Chame o componente passando o tipo como um "atributo HTML": `<x-alert type="sucesso">Operação realizada com sucesso!</x-alert>`.

-----

**Dica:** O Blade é compilado em PHP puro na primeira vez que uma view é carregada. O Laravel salva esse PHP compilado na pasta `storage/framework/views`. Isso significa que o Blade não adiciona nenhuma lentidão à sua aplicação. Ele oferece apenas uma sintaxe muito mais limpa e agradável para trabalhar.