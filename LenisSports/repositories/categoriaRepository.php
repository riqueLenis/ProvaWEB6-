<?php
require_once "config/db.php";

class CategoriaRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function cria(Categoria $categoria) {
        $stmt = $this->db->prepare("INSERT INTO categoria (nome) VALUES (:nome)");
        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->execute();
    }

    public function buscaPeloId($id) {
        $stmt = $this->db->prepare("SELECT * FROM categoria WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscaTodas() {
        $stmt = $this->db->query("SELECT * FROM categoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualiza(Categoria $categoria) {
        $stmt = $this->db->prepare("UPDATE categoria SET nome = :nome WHERE id = :id");
        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->bindValue(':id', $categoria->getId());
        $stmt->execute();
    }

    public function remove($id) {
        $stmt = $this->db->prepare("DELETE FROM categoria WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
?>
