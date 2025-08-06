# API Plan - SIGA Saúde

Este documento serve como guia para migrar as rotas web existentes para API REST.

## Estrutura das Rotas Atuais (Web)

### Rotas Públicas
- `GET /` - Página inicial (welcome)
- `GET /dashboard` - Dashboard (requer autenticação)

### Rotas de Autenticação
- Rotas do Laravel Breeze (`/auth.php`)
  - Login, Register, Logout, etc.

### Rotas de Perfil (Autenticadas)
- `GET /profile` - Editar perfil
- `PATCH /profile` - Atualizar perfil  
- `DELETE /profile` - Deletar perfil

### Rotas de Administrador
**Middleware:** `auth, ChecarPapel:administrador`
- `Route::resource('usuarios', UsuarioController::class)`
  - `GET /usuarios` - Listar usuários
  - `GET /usuarios/create` - Formulário criar usuário
  - `POST /usuarios` - Criar usuário
  - `GET /usuarios/{id}` - Mostrar usuário
  - `GET /usuarios/{id}/edit` - Formulário editar usuário
  - `PUT/PATCH /usuarios/{id}` - Atualizar usuário
  - `DELETE /usuarios/{id}` - Deletar usuário

### Rotas de Recepcionista/Admin
**Middleware:** `auth, ChecarPapel:administrador,recepcionista`
- `GET /pacientes/criarPaciente` - Formulário criar paciente
- `POST /pacientes` - Criar paciente
- `GET /consultas/criarConsulta` - Formulário criar consulta
- `POST /consultas` - Criar consulta

### Rotas de Médico
**Middleware:** `auth, ChecarPapel:medico`
- `GET /minhas-consultas` - Listar consultas do médico

### Rotas Gerais (Autenticadas)
**Middleware:** `auth`
- `Route::resource('consultas', ConsultaController::class)`
- `Route::resource('pacientes', PacienteController::class)`
- `GET /consultas/{id}` - Mostrar consulta específica

---

## Plano de Migração para API REST

### 1. Rotas de Autenticação API
```
POST /api/v1/login - Login do usuário
POST /api/v1/logout - Logout do usuário
GET /api/v1/user - Dados do usuário autenticado
PUT /api/v1/user - Atualizar perfil do usuário
```

### 2. API de Usuários (Admin)
**Middleware:** `auth:sanctum, ChecarPapel:administrador`
```
GET /api/v1/usuarios - Listar todos os usuários
POST /api/v1/usuarios - Criar novo usuário
GET /api/v1/usuarios/{id} - Mostrar usuário específico
PUT /api/v1/usuarios/{id} - Atualizar usuário
DELETE /api/v1/usuarios/{id} - Deletar usuário
```

### 3. API de Pacientes
#### Para Recepcionista/Admin
**Middleware:** `auth:sanctum, ChecarPapel:administrador,recepcionista`
```
GET /api/v1/pacientes - Listar todos os pacientes
POST /api/v1/pacientes - Criar novo paciente
PUT /api/v1/pacientes/{id} - Atualizar paciente
DELETE /api/v1/pacientes/{id} - Deletar paciente
```

#### Para usuários autenticados (visualização)
**Middleware:** `auth:sanctum`
```
GET /api/v1/pacientes - Listar pacientes (com permissões)
GET /api/v1/pacientes/{id} - Mostrar paciente específico
```

### 4. API de Consultas
#### Para Recepcionista/Admin
**Middleware:** `auth:sanctum, ChecarPapel:administrador,recepcionista`
```
GET /api/v1/consultas - Listar todas as consultas
POST /api/v1/consultas - Criar nova consulta
PUT /api/v1/consultas/{id} - Atualizar consulta
DELETE /api/v1/consultas/{id} - Deletar consulta
```

#### Para Médicos
**Middleware:** `auth:sanctum, ChecarPapel:medico`
```
GET /api/v1/medico/consultas - Listar minhas consultas
PUT /api/v1/consultas/{id}/status - Atualizar status da consulta
POST /api/v1/consultas/{id}/observacoes - Adicionar observações
```

#### Para usuários autenticados (visualização)
**Middleware:** `auth:sanctum`
```
GET /api/v1/consultas/{id} - Mostrar consulta específica
```

---

## Estrutura de Resposta da API

### Formato Padrão de Resposta
```json
{
    "success": true,
    "message": "Mensagem de sucesso",
    "data": {
        // dados da resposta
    },
    "meta": {
        // metadados (paginação, etc.)
    }
}
```

### Formato de Erro
```json
{
    "success": false,
    "message": "Mensagem de erro",
    "errors": {
        // detalhes dos erros de validação
    }
}
```

---

## Checklist de Implementação

### Configuração Inicial
- [X] Instalar Laravel Sanctum
- [ ] Configurar middleware de API
- [ ] Adaptar middleware `ChecarPapel` para APIs
- [ ] Criar traits para respostas padronizadas

### Controllers API
- [X] Criar `Api\AuthController`
- [ ] Criar `Api\UsuarioController`
- [X] Criar `Api\PacienteController`
- [ ] Criar `Api\ConsultaController`
- [ ] Criar `Api\ProfileController`

### Validação e Recursos
- [ ] Criar Form Requests para validação
- [ ] Criar API Resources para formatação de dados
- [ ] Implementar paginação nas listagens

### Testes
- [ ] Testes de autenticação
- [ ] Testes de autorização (papéis)
- [ ] Testes CRUD para cada recurso
- [ ] Testes de validação

### Documentação
- [ ] Documentar endpoints no Postman/Swagger
- [ ] Criar exemplos de requisições
- [ ] Documentar códigos de erro

---

## Notas Importantes

1. **Autenticação:** Usar Laravel Sanctum para tokens de API
2. **Autorização:** Adaptar o middleware `ChecarPapel` para funcionar com APIs
3. **Validação:** Todas as entradas devem ser validadas
4. **Erro Handling:** Implementar tratamento global de erros
5. **Rate Limiting:** Configurar throttling para APIs
6. **CORS:** Configurar CORS adequadamente para frontend

---

## Próximos Passos

1. Configurar Laravel Sanctum
2. Criar estrutura base dos controllers API
3. Implementar autenticação JWT/Sanctum
4. Migrar rotas uma por uma, testando cada endpoint
5. Criar documentação da API
6. Implementar testes automatizados
