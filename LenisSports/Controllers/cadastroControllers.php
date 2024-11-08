<?php
class CadastroController {
    private $repository;

    public function __construct(CadastroRepository $repository) {
        $this->repository = $repository;
    }

    public function list(){
        $cadastros = [
            [
                'id' => 1,
                'nome' => 'luiz',
                'telefone' => '123',
                'email' => 'luiz@gmail.com'
            ]
            ];

            header('Content-Type: application/json');
            echo json_encode($cadastros);
    }

    public function criaCadastro($nome, $telefone, $email) {
        $cadastro = new Cadastro();
        $cadastro->setNome($nome);
        $cadastro->setTelefone($telefone);
        $cadastro->setEmail($email);
        $this->repository->cria($cadastro);
    }

    public function cadastroPorId($id) {
        return $this->repository->buscaPeloId($id);
    }

    public function listaTodos() {
        return $this->repository->buscaTodos();
    }

    public function atualizaCadastro($id, $nome, $telefone, $email) {
        $cadastro = new Cadastro();
        $cadastro->setId($id);
        $cadastro->setNome($nome);
        $cadastro->setTelefone($telefone);
        $cadastro->setEmail(email: $email);
        $this->repository->atualiza($cadastro);
    }

    public function removeCadastro($id) {
        $this->repository->remove($id);
    }
}
?>
