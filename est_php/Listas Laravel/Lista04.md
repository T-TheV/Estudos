
# Lista de Exercícios 04: Autenticação e Autorização 🔒

**Objetivo:** Aprender a implementar autenticação e autorização de usuários no Laravel, protegendo rotas e personalizando o fluxo de acesso.

**Instruções:**
1. Crie uma pasta chamada `lista04` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Teste as funcionalidades acessando `http://localhost:8000`.

---


### Exercício 1: Instalação de Autenticação
No terminal, execute:
`composer require laravel/breeze --dev`
`php artisan breeze:install`
`php artisan migrate`
Teste o login e registro padrão.

### Exercício 2: Autenticação de Usuários
Implemente login e registro. Teste o fluxo acessando `/login` e `/register`. Crie usuários e faça login/logout.

### Exercício 3: Páginas Protegidas
No controller, use o middleware `auth`:
```php
public function dashboard() {
    $this->middleware('auth');
    return view('dashboard');
}
```
Tente acessar sem estar logado.

### Exercício 4: Logout
Adicione um botão de logout na view:
```blade
<form method="POST" action="{{ route('logout') }}">@csrf<button>Logout</button></form>
```

### Exercício 5: Validação de Registro
No controller de registro, adicione regras:
```php
$request->validate(['email' => 'required|email|unique:users', ...]);
```

### Exercício 6: Middleware de Proteção
Crie um middleware com:
`php artisan make:middleware VerificaAdmin`
No middleware, verifique o papel do usuário e bloqueie acesso se necessário.

### Exercício 7: Autorização por Papel
Adicione um campo `role` na tabela de usuários. No middleware, permita acesso apenas para determinados papéis.

### Exercício 8: Informações do Usuário Logado
Na view Blade, exiba:
```blade
<p>Usuário: {{ Auth::user()->name }}</p>
```

### Exercício 9: Personalização das Views
Edite os arquivos em `resources/views/auth` para mudar textos, layout e adicionar campos extras.

### Exercício 10: Diferença entre Autenticação e Autorização
Explique: Autenticação verifica quem é o usuário (login), autorização define o que ele pode acessar (permissões/papéis).

---

**Dica:** O Laravel oferece pacotes prontos para autenticação, mas você pode personalizar todo o fluxo conforme a necessidade do projeto. Consulte a documentação oficial para exemplos avançados: https://laravel.com/docs/authentication
