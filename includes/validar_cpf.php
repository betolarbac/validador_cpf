<?php
function validarCPF($cpf)
{
    // Remover caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verificar se o CPF possui 11 dígitos
    if (strlen($cpf) !== 11) {
        return false;
    }

    // Verificar se todos os dígitos são iguais (CPF inválido, mas cumpre o padrão)
    if (preg_match('/^(\d)\1+$/', $cpf)) {
        return false;
    }

    // Calcular os dígitos verificadores
    $digitos = str_split($cpf);
    $soma = 0;

    for ($i = 0; $i < 9; $i++) {
        $soma += $digitos[$i] * (10 - $i);
    }

    $resto = $soma % 11;
    $primeiro_digito = ($resto < 2) ? 0 : 11 - $resto;

    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += $digitos[$i] * (11 - $i);
    }

    $resto = $soma % 11;
    $segundo_digito = ($resto < 2) ? 0 : 11 - $resto;

    // Verificar os dígitos verificadores
    if ($cpf[9] != $primeiro_digito || $cpf[10] != $segundo_digito) {
        return false;
    }

    return true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cpf = $_POST["cpf"];


    if (validarCPF($cpf)) {
        echo "<p>CPF válido: $cpf</p>";
    } else {
        echo "<p>CPF inválido: $cpf</p>";
    }
}