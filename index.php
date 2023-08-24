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
        <input type="number" id="cpf" name="cpf" maxlength="14" placeholder="Digite o CPF">
        <button type="submit">Verificar</button>
    </form>

    <?php require './includes/validar_cpf.php'; ?>
</body>

</html>