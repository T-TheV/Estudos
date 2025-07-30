
# Lista de Exercícios 10: Deploy, Boas Práticas e Recursos Avançados 🚀

**Objetivo:** Aprender sobre deploy, boas práticas e recursos avançados do Laravel, preparando o projeto para produção e explorando funcionalidades extras.

**Instruções:**
1. Crie uma pasta chamada `lista10` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Teste as funcionalidades conforme o ambiente de produção ou simulado.

---


### Exercício 1: Preparando para Deploy
Revise o arquivo `.env` e defina `APP_ENV=production` e `APP_DEBUG=false`. Execute `composer install --optimize-autoloader --no-dev` para otimizar dependências. Remova arquivos desnecessários e ajuste permissões das pastas `storage` e `bootstrap/cache` para garantir que o servidor web possa gravar nelas.

### Exercício 2: Variáveis de Ambiente
No `.env`, configure variáveis como `APP_KEY`, `DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, além de serviços externos (e-mail, cache, etc). Nunca versionar o `.env` no Git. Teste se todas as variáveis estão corretas rodando o projeto em ambiente de produção.

### Exercício 3: Cache com Redis ou Memcached
Instale Redis ou Memcached no servidor. No `.env`, altere `CACHE_DRIVER=redis` ou `CACHE_DRIVER=memcached`. Teste o cache com `php artisan cache:clear` e implemente cache em controllers usando `Cache::remember('chave', 60, function() { ... })` para armazenar dados por 60 minutos.

### Exercício 4: Queues para Tarefas Assíncronas
No `.env`, defina `QUEUE_CONNECTION=redis` ou outro driver. Crie jobs com `php artisan make:job NomeDoJob`. Dispare tarefas assíncronas usando `dispatch(new NomeDoJob())` e execute o worker com `php artisan queue:work`. Use para envio de e-mails, processamento de imagens, etc.

### Exercício 5: Jobs e Eventos
Implemente eventos com `php artisan make:event NovoEvento` e listeners com `php artisan make:listener NovoListener`. Dispare eventos no código (`event(new NovoEvento($dados))`) e associe listeners para ações automáticas, como notificar usuários após cadastro.

### Exercício 6: Logs e Monitoramento
No `.env`, configure `LOG_CHANNEL=stack` ou outro canal. Utilize Laravel Telescope ou Sentry para monitorar erros. Visualize logs em `storage/logs/laravel.log` e crie alertas para falhas críticas. Teste o registro de logs com `Log::info('Mensagem de teste')`.

### Exercício 7: Políticas de Segurança
Adicione `@csrf` em todos os formulários para proteção contra CSRF. Sanitize entradas para evitar XSS usando `e($variavel)` ou `htmlspecialchars`. Implemente validação robusta nos controllers e middlewares para garantir integridade dos dados.

### Exercício 8: Deploy em Serviços
Siga tutoriais para deploy no Heroku, DigitalOcean ou outros. Configure variáveis de ambiente, banco de dados, storage e cache. Teste o acesso público, monitore logs e garanta que o site está seguro e rápido. Use comandos como `git push heroku main` ou configure o servidor manualmente.

### Exercício 9: Pacotes Populares
Pesquise e instale pacotes como Laravel Debugbar, Spatie Permission, Laravel Excel, Socialite, entre outros. Instale com `composer require nome/pacote`, configure e use cada pacote em um exemplo prático, como adicionar permissões de usuário ou exportar dados para Excel.

### Exercício 10: Boas Práticas
Versione o código com Git, use migrations para banco de dados, mantenha o `.env` fora do repositório, valide todas as entradas, utilize testes automatizados, documente a API, monitore logs e atualize dependências regularmente. Sempre revise permissões e mantenha backups do banco de dados.

---

**Dica:** Um deploy bem feito garante segurança, desempenho e escalabilidade. Consulte a documentação oficial para exemplos avançados: https://laravel.com/docs/deployment
