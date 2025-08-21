<?php
use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('convidado nao pode listar pacientes', function () {
    $response = $this->getJson('/api/v1/pacientes');  // Note: adicionei v1
    
    // Vamos ver o que está retornando
    if ($response->status() === 500) {
        dd($response->json());
    }
    
    $response->assertUnauthorized();
});

test('pode criar um novo paciente quando autenticado', function () {
    // Arrange: Prepara o ambiente
    $user = User::factory()->create();
    Sanctum::actingAs($user); // Simula o login do usuário
    $pacienteData = [
        'nome' => 'Fulano de Tal',
        'cpf' => '123.456.789-00',
        'data_nascimento' => '1990-01-01',
        'telefone' => '123456789',
        'endereco' => 'Rua Exemplo, 123, Cidade, Estado',
    ];

    // Act: Executa a ação
    $response = $this->postJson('/api/v1/pacientes', $pacienteData);

    // Assert: Verifica o resultado
    $response->assertStatus(201); // Verifica se foi criado com sucesso
    $this->assertDatabaseHas('pacientes', ['cpf' => '123.456.789-00']);
});


test('paciente nao pode ser criado com CPF invalido', function () {
    // Arrange: Prepara o ambiente
    $user = User::factory()->create(); // Cria um usuário para autenticação
    Sanctum::actingAs($user); // Simula o login do usuário
    $pacienteData = [
        'nome' => 'Fulano de Tal',
        'cpf' => 'invalid-cpf', // CPF propositalmente inválido para testar validação
        'data_nascimento' => '1990-01-01',
        'telefone' => '123456789',
        'endereco' => 'Rua Exemplo, 123, Cidade, Estado',
    ];

    // Act: Executa a ação
    $response = $this->postJson('/api/v1/pacientes', $pacienteData); // Tenta criar paciente com CPF inválido

    // Assert: Verifica o resultado
    $response->assertStatus(422); // Verifica se retornou erro de validação (Unprocessable Entity)
    $this->assertDatabaseMissing('pacientes', ['cpf' => 'invalid-cpf']); // Confirma que não foi salvo no banco
});


test('paciente deve ter validacao de CPF unico', function () {
    // Arrange: Prepara o ambiente
    $user = User::factory()->create();
    Sanctum::actingAs($user);
    
    // Cria um paciente com um CPF específico
    $pacienteData = [
        'nome' => 'Fulano de Tal',
        'cpf' => '123.456.789-00',
        'data_nascimento' => '1990-01-01',
        'telefone' => '123456789',
        'endereco' => 'Rua Exemplo, 123, Cidade, Estado',
    ];
    
    $this->postJson('/api/v1/pacientes', $pacienteData);

    // Tenta criar outro paciente com o mesmo CPF
    $response = $this->postJson('/api/v1/pacientes', $pacienteData);

    // Assert: Verifica se retornou erro de validação
    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['cpf']);
});


test('paciente deve ter todos os dados preenchidos', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);
    
    $pacienteData=[]; // nenhum campo enviado.

    $response = $this->postJson('api/v1/pacientes', $pacienteData);
    expect($response->status())->toBe(422);
    $response->assertJsonValidationErrors(['nome', 'cpf', 'data_nascimento', 'telefone', 'endereco']);

});

test('paciente deve ter um cpf com 11 digitos', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

        $pacienteData = [
        'nome' => 'Teste CPF',
        'cpf' => 'aw12312', //'000.111.222-10', // inválido (não numérico e muito curto)
        'data_nascimento' => '1990-01-01',
        'telefone' => '123456789',
        'endereco' => 'Rua Teste, 123',
    ];

    $response = $this->postJson('api/v1/pacientes', $pacienteData);
    expect($response->status())->toBe(422);
    $response->assertJsonValidationErrors(['cpf']);
});

test('paciente nao pode ter data de nascimento futura', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $pacienteData = [
        'nome' => 'Teste CPF',
        'cpf' => '000.111.222-10',
        'data_nascimento' => now()->addYear()->toDateString(), // data no futuro
        'telefone' => '123456789',
        'endereco' => 'Rua Teste, 123',
    ];
    $response = $this->postJson('api/v1/pacientes', $pacienteData);
    expect($response->status())->toBe(422);
    $response->assertJsonValidationErrors(['data_nascimento']);
});

test('usuario autenticado pode listar pacientes', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $response = $this->getJson('/api/v1/pacientes');
    
    $response->assertStatus(200);
});


test('usuario autenticado pode ver um paciente especifico', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    // Cria um paciente para teste
    $paciente = \App\Models\Paciente::factory()->create([
        'nome' => 'Paciente Teste',
        'cpf' => '123.456.789-00',
        'data_nascimento' => '1990-01-01',
        'telefone' => '123456789',
        'endereco' => 'Rua Exemplo, 123, Cidade, Estado',
    ]);

    $response = $this->getJson("/api/v1/pacientes/{$paciente->id}");
    
    $response->assertStatus(200);
    $response->assertJsonFragment(['nome' => 'Paciente Teste']);
});

test('usuario autenticado pode atualizar um paciente', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    // Cria um paciente para teste
    $paciente = \App\Models\Paciente::factory()->create([
        'nome' => 'Paciente Teste',
        'cpf' => '123.456.789-00',
        'data_nascimento' => '1990-01-01',
        'telefone' => '123456789',
        'endereco' => 'Rua Exemplo, 123, Cidade, Estado',
    ]);

    $updatedData = [
        'nome' => 'Paciente Atualizado',
        'cpf' => '123.456.789-00',
        'data_nascimento' => '1990-01-01',
        'telefone' => '987654321',
        'endereco' => 'Rua Atualizada, 456, Cidade, Estado',
    ];

    $response = $this->putJson("/api/v1/pacientes/{$paciente->id}", $updatedData);
    
    $response->assertStatus(200);
    $this->assertDatabaseHas('pacientes', ['nome' => 'Paciente Atualizado']);
});
 