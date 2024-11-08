<?php
class CadastroRepository {
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
    public function cria(Cadastro $cadastro) {
        $sql = "INSERT INTO cadastro (nome, telefone, email) VALUES (:nome, :telefone, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $cadastro->getNome());
        $stmt->bindValue(':telefone', $cadastro->getTelefone());
        $stmt->bindValue(':email', $cadastro->getEmail());
        $stmt->execute();
    }

    public function buscaPeloId($id) {
        $sql = "SELECT * FROM cadastro WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // localhost:8000/cadastro/1

    public function buscaTodos() {
        $sql = "SELECT * FROM cadastro";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualiza(Cadastro $cadastro) {
        $sql = "UPDATE cadastro SET nome = :nome, telefone = :telefone, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $cadastro->getNome());
        $stmt->bindValue(':telefone', $cadastro->getTelefone());
        $stmt->bindValue(':email', $cadastro->getEmail());
        $stmt->bindValue(':id', $cadastro->getId());
        $stmt->execute();
    }

    public function remove($id) {
        $sql = "DELETE FROM cadastro WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
?>
