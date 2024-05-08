<?php
/*CRIAR A CLASSE PESSOAS_BANCO 
(tds2023/exemplo_banco/pessoasbanco.class.php)
*/

include "conexao.class.php";

class Pessoas_banco
{
    //criar setters e getters
    private $id_pessoa;
    private $nome;
    private $email;
    private $idade;

    #region get/set
    function setId_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    function getId_pessoa()
    {
        return $this->id_pessoa;
    }
    function setNome($nome)
    {
        $this->nome = $nome;
    }
    function getNome()
    {
        return $this->nome;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function getEmail()
    {
        return $this->email;
    }
    function setIdade($idade)
    {
        $this->idade = $idade;
    }
    function getIdade()
    {
        return $this->idade;
    }
    #endregion
    function listaPessoas()
    {
        $database = new Conexao(); // nova instância da conexao
        $db = $database->getConnection(); // tenta conectar

        $sql = "SELECT * FROM pessoa";
        try {
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $e) {
            echo 'Erro ao listar pessoas: ' . $e->getMessage();
            $result = [];
            return $result;
        }

    }

    function inserirPessoa()
    {
        $database = new Conexao(); // nova instância da conexao
        $db = $database->getConnection(); // tenta conectar

        $sql = "INSERT INTO pessoa (nome, email, idade) VALUES (:nome, :email, :idade)";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':idade', $this->idade);
            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            echo "Erro ao inserir pessoa: " . $e->getMessage();
            return false;
        }
    }

    function deletarPessoa($index)
    {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "DELETE FROM pessoa WHERE id_pessoa = :id";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $index);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar pessoa: " . $e->getMessage();
            return false;
        }
    }

    function atualizarPessoa()
    {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "UPDATE pessoa SET nome = :nome, email = :email, idade = :idade WHERE id_pessoa = :id";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":idade", $this->idade);
            $stmt->bindParam(":id", $this->id_pessoa);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar pessoa: " . $e->getMessage();
            return false;
        }
    }
}
?>