<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoas</title>
</head>

<body>
    <h2>Pessoas</h2>
    <a href="inserirPessoa.php">Inserir</a>
    <a href="deletarPessoa.php">Remover</a>
    <a href="editarPessoa.php">Editar</a>
    <hr><br>

    <?php
    include "pessoasbanco.class.php";

    $p = new Pessoas_banco;
    $pessoas = $p->listaPessoas();
    foreach ($pessoas as $pessoa) {
        echo "<b>ID: </b>" . $pessoa['id_pessoa'] . "<br>";
        echo "<b>Nome: </b>" . $pessoa['nome'] . "<br>";
        echo "<b>Email: </b>" . $pessoa['email'] . "<br>";
        echo "<b>Idade: </b>" . $pessoa['idade'] . "<br>";
        echo "<br>";
    }
    ?>
</body>

</html>