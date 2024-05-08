<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar pessoa</title>
</head>

<body>
    <h2>Adicionar pessoa</h2>
    <a href="index.php">Voltar</a>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
            window.onload = function() {
                document.getElementById("nome").focus();
            };
        </script>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['idade'])) {
        include "pessoasbanco.class.php";

        $p = new Pessoas_banco();
        $p->setNome($_POST["nome"]);
        $p->setEmail($_POST["email"]);
        $p->setIdade($_POST["idade"]);

        if ($p->inserirPessoa()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Falha ao inserir pessoa!";
        }
    }
    ?>
</body>

</html>
