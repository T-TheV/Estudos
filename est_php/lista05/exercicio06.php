<?php

function montarMensagem($nome_paciente, $assunto = "Consulta de Rotina"){
    $mensagem = "Prezado(a) $nome_paciente, lembramos que sua $assunto está agendada.";
    return $mensagem;

}

echo montarMensagem("João Silva"); // Chama a função com o nome do paciente e o assunto
echo montarMensagem("João Silva", "Exame de Sangue"); // Chama a função com o nome do paciente e um assunto específico
?>