<?php
class Pedido {
    private $id;
    private $descricao;
    private $quantidade;

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
}
?>
