<?php
require_once "config/db.php";

class PedidoRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function cria(Pedido $pedido) {
        $stmt = $this->db->prepare("INSERT INTO pedido (descricao, quantidade) VALUES (:descricao, :quantidade)");
        $stmt->bindValue(':descricao', $pedido->getDescricao());
        $stmt->bindValue(':quantidade', $pedido->getQuantidade());
        $stmt->execute();
    }

    public function buscaPeloId($id) {
        $stmt = $this->db->prepare("SELECT * FROM pedido WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscaTodos() {
        $stmt = $this->db->query("SELECT * FROM pedido");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualiza(Pedido $pedido) {
        $stmt = $this->db->prepare("UPDATE pedido SET descricao = :descricao, quantidade = :quantidade WHERE id = :id");
        $stmt->bindValue(':descricao', $pedido->getDescricao());
        $stmt->bindValue(':quantidade', $pedido->getQuantidade());
        $stmt->bindValue(':id', $pedido->getId());
        $stmt->execute();
    }

    public function remove($id) {
        $stmt = $this->db->prepare("DELETE FROM pedido WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
?>
