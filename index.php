<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Validador de CPF</title>
</head>

<body>
    <h1>Validador de CPF</h1>

    <form method="post" action="">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" maxlength="14" placeholder="Digite o CPF" oninput="formatCPF(this)" oninput="allowOnlyNumbers(event)">
        <button type="submit">Verificar</button>
    </form>

    <?php require './includes/validar_cpf.php'; ?>
</body>

<script>
    function allowOnlyNumbers(event) {
        event.target.value = event.target.value.replace(/\D/g, '');
    }
    // Função para formatar o CPF com separadores
    function formatCPF(input) {
        // Remove todos os caracteres não numéricos
        var value = input.value.replace(/\D/g, '');

        // Formata o valor com os separadores
        if (value.length > 3 && value.length <= 6) {
            value = value.replace(/(\d{3})(\d{0,3})/, '$1.$2');
        } else if (value.length > 6 && value.length <= 9) {
            value = value.replace(/(\d{3})(\d{3})(\d{0,3})/, '$1.$2.$3');
        } else if (value.length > 9) {
            value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2})/, '$1.$2.$3-$4');
        }

        input.value = value;
    }
</script>

</html>