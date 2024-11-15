<?php
class CategoriaController {
    private $repository;

    public function __construct(categoriaRepository $repository) {
        $this->repository = $repository;
    }

    public function list(){
        $categorias = $this->repository->buscaTodas();
        header('Content-Type: application/json');
        echo json_encode($categorias);
    }

    public function criaCategoria($nome) {
        $categoria = new Categoria();
        $categoria->setNome($nome);
        $this->repository->cria($categoria);
    }

    public function categoriaPorId($id) {
        return $this->repository->buscaPeloId($id);
    }

    public function atualizaCategoria($id, $nome) {
        $categoria = new Categoria();
        $categoria->setId($id);
        $categoria->setNome($nome);
        $this->repository->atualiza($categoria);
    }

    public function removeCategoria($id) {
        $this->repository->remove($id);
    }
}
?>
