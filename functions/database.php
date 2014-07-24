<?php

// Conectar Banco de Dados ------------------------ //
function conectarDB() {
    $dns = "mysql:host=localhost;dbname=code.php";
    $user = "root";
    $key = "root";
    $dbName = "`code.php`";
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];

    try {
        $conexao = new \PDO($dns,$user,$key,$options);
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
    return $conexao;
}

// Resgatar Dados no Banco de Dados ------------------------ //
function getDados($pagina) {
    $conexao = conectarDB();

    try {
        $busca = $conexao->prepare("Select * from paginas where pagina = :pag");
        $busca->bindValue(":pag",$pagina);
        $busca->execute();
        $dados = $busca->fetch(PDO::FETCH_ASSOC);
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
    return $dados;
}

//  Buscar Dados no Banco de Dados ------------------------ //
/*function searchDados() {
    $conexao = conectarDB();

    try {
        $busca = $conexao->prepare("Select * from paginas");
        $busca->execute();
        $dados = $busca->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
    return $dados;
}*/

// Cadastrar Dados no Banco de Dados ------------------------ //
function cadastrarDados() {

    $conexao = conectarDB();

    try {
        $query = ("insert into paginas(pagina,titulo,conteudo) values('home','Página Inicial','Conteúdo da Página Inicial')");
        $cadastrar = $conexao->prepare("TRUNCATE table paginas");
        $cadastrar->execute();
        $cadastrar = $conexao->prepare("INSERT INTO paginas (pagina,titulo,conteudo) VALUES ('home','Página Inicial','Conteúdo da página inicial')");
        $cadastrar->execute();
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
};