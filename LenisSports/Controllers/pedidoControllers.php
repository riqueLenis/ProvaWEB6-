<?php
class PedidoController {
    private $repository;

    public function __construct(pedidoRepository $repository) {
        $this->repository = $repository;
    }

    public function list(){
        $pedidos = $this->repository->buscaTodos();
        header('Content-Type: application/json');
        echo json_encode($pedidos);
    }

    public function criaPedido($descricao, $quantidade) {
        $pedido = new Pedido();
        $pedido->setDescricao($descricao);
        $pedido->setQuantidade($quantidade);
        $this->repository->cria($pedido);
    }

    public function pedidoPorId($id) {
        return $this->repository->buscaPeloId($id);
    }

    public function atualizaPedido($id, $descricao, $quantidade) {
        $pedido = new Pedido();
        $pedido->setId($id);
        $pedido->setDescricao($descricao);
        $pedido->setQuantidade($quantidade);
        $this->repository->atualiza($pedido);
    }

    public function removePedido($id) {
        $this->repository->remove($id);
    }
}
?>
