<?php
class Cadastro{
    private $id;
    private $nome;
    private $telefone;
    private $email;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cria uma nova instância da classe Cadastro
    $cadastro = new Cadastro();

    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Configura os dados no objeto Cadastro
    $cadastro->setNome($nome);
    $cadastro->setEmail($email);

    // Aqui você pode salvar os dados no banco de dados ou arquivo (depende da sua necessidade)
    // Exemplo (salvando em um arquivo, você pode modificar para salvar no banco)
    $dados = "Nome: " . $cadastro->getNome() . " | Email: " . $cadastro->getEmail() . "\n";
    file_put_contents('cadastros.txt', $dados, FILE_APPEND);

    // Redireciona para a página do formulário com uma variável de sucesso
    header('Location: /formCadastro.php?success=1');
    exit();
}