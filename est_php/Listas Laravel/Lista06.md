
# Lista de Exercícios 06: Blade, Layouts e Componentes 🧩

**Objetivo:** Aprender a criar layouts, componentes e partials com Blade, organizando o front-end do projeto Laravel de forma eficiente.

**Instruções:**
1. Crie uma pasta chamada `lista06` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Teste as funcionalidades acessando `http://localhost:8000`.

---


### Exercício 1: Layout Principal
Crie `resources/views/layouts/app.blade.php` com HTML base e `@yield('conteudo')`. Use para todas as páginas.

### Exercício 2: Yield e Section
Em uma view, defina:
```blade
@section('conteudo')
    <h1>Página Inicial</h1>
@endsection
```
No layout, use `@yield('conteudo')`.

### Exercício 3: Componentes Blade
Crie com:
`php artisan make:component Alerta`
Use `<x-alerta tipo="sucesso" mensagem="Cadastro realizado!" />` na view.

### Exercício 4: Passando Dados para Componentes
No componente, defina propriedades públicas. Passe valores ao chamar o componente.

### Exercício 5: Slots em Componentes
No componente Blade, use `{{ $slot }}` para conteúdo flexível:
```blade
<x-card>
    <p>Conteúdo do card</p>
</x-card>
```

### Exercício 6: Partials de Cabeçalho e Rodapé
Crie `header.blade.php` e `footer.blade.php`. Inclua nas views com `@include('header')` e `@include('footer')`.

### Exercício 7: Diretivas Condicionais
Use `@if`, `@foreach`, `@isset` para lógica de exibição:
```blade
@if($usuario)
    <p>Bem-vindo, {{ $usuario }}</p>
@endif
```

### Exercício 8: Assets no Blade
Inclua CSS/JS com:
```blade
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
```

### Exercício 9: Layouts Personalizados
Crie layouts diferentes para páginas públicas e restritas, usando `@extends` e `@section`.

### Exercício 10: Importância do Blade
Explique: Blade facilita a criação de layouts dinâmicos, componentes reutilizáveis e lógica de exibição, tornando o front-end mais organizado e produtivo.

---

**Dica:** O Blade facilita a criação de layouts dinâmicos e componentes reutilizáveis, tornando o desenvolvimento front-end mais produtivo. Consulte a documentação oficial para exemplos avançados: https://laravel.com/docs/blade
