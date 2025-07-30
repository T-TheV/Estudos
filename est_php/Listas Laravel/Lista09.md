
# Lista de Exercícios 09: Testes Automatizados 🧪

**Objetivo:** Aprender a criar testes automatizados com PHPUnit e Laravel, garantindo qualidade e segurança no desenvolvimento.

**Instruções:**
1. Crie uma pasta chamada `lista09` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Execute os testes usando o comando `php artisan test` ou `vendor/bin/phpunit`.

---


### Exercício 1: Testes Unitários
Crie arquivos em `tests/Unit`. Teste funções isoladas, como cálculo de média ou validação de CPF. Use assertions como `assertEquals`.

### Exercício 2: Testes de Feature
Em `tests/Feature`, teste rotas e controllers. Simule requisições HTTP e verifique respostas com `assertStatus(200)`.

### Exercício 3: Testando Rotas e Controllers
Use métodos como `get`, `post` do Laravel Test para acessar rotas e verificar redirecionamentos, mensagens e dados retornados.

### Exercício 4: Testando Models e Relacionamentos
Crie dados de teste com factories. Teste se relacionamentos (hasMany, belongsTo) funcionam corretamente.

### Exercício 5: Testes de Validação
Simule envio de formulários com dados inválidos e verifique se os erros são retornados corretamente.

### Exercício 6: Factories nos Testes
Use factories para criar usuários, posts, etc. Exemplo:
```php
$usuario = Usuario::factory()->create();
```

### Exercício 7: Testando Autenticação e Autorização
Teste acesso a rotas protegidas, login/logout, permissões de usuário. Use `actingAs($usuario)` para simular usuário logado.

### Exercício 8: Relatórios de Cobertura
Execute `vendor/bin/phpunit --coverage-html coverage` para gerar relatório visual da cobertura dos testes.

### Exercício 9: Automatizando Testes
Configure GitHub Actions ou outra ferramenta CI/CD para rodar testes automaticamente a cada push ou pull request.

### Exercício 10: Importância dos Testes Automatizados
Explique: Testes automatizados garantem que novas funcionalidades não quebrem o sistema, facilitam manutenção e aumentam a confiança no código.

---

**Dica:** Testes automatizados ajudam a evitar bugs e garantem que novas funcionalidades não quebrem o sistema. Consulte a documentação oficial para exemplos avançados: https://laravel.com/docs/testing
