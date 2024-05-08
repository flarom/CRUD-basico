<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Pessoa</title>
</head>
<body>
    <h2>Remover pessoa</h2>
    <a href="index.php">Voltar</a>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="id_pessoa">ID da Pessoa:</label>    
        <input type="number" id="id_pessoa" name="id_pessoa">
        <br>
        <br>
        <button type="submit">Salvar</button>
        <button type="reset">Limpar</button>
        <script>
            window.onload = function() {
                document.getElementById("id_pessoa").focus();
            };
        </script>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_pessoa']) && !empty($_POST['id_pessoa'])) {
        include "pessoasbanco.class.php";

        $id_pessoa = $_POST['id_pessoa'];
        
        $p = new Pessoas_banco;
        if($p->deletarPessoa($id_pessoa)){
            header("Location: index.php");
            exit();
        } else {
            echo "Falha ao remover pessoa";
        }
    }
    ?>
</body>

</html>
