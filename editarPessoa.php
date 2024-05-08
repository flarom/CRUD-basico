<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar pessoa</title>
</head>

<body>
    <h2>Editar pessoa</h2>
    <a href="index.php">Voltar</a>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="id_pessoa">ID da Pessoa: </label>
        <input type="number" name="id_pessoa" id="id_pessoa" min="0" required>
        <br>
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="email">E-mail: </label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="idade">Idade: </label>
        <input type="number" name="idade" id="idade" min="0" required>
        <br>
        <br>
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
        <script>
            window.onload = function () {
                document.getElementById("id_pessoa").focus();
            };
        </script>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_pessoa']) && !empty($_POST['id_pessoa'])) {
        include "pessoasbanco.class.php";

        $p = new Pessoas_banco();
        $p->setId_pessoa($_POST["id_pessoa"]);
        $p->setNome($_POST["nome"]);
        $p->setEmail($_POST["email"]);
        $p->setIdade($_POST["idade"]);

        if ($p->atualizarPessoa()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Falha ao editar pessoa!";
        }
    }
    ?>
</body>

</html>