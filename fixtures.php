<?php

require_once ('functions/database.php');

function criarDataBase() {
    $dns = "mysql:host=localhost";
    $user = "root";
    $key = "root";
    $dbName = "`code.php`";
    $tableName = "paginas";

    try {
        $conexao = new \PDO($dns,$user,$key);
        $conexao->query("CREATE DATABASE IF NOT EXISTS $dbName");
        $conexao->query("use $dbName");
        echo "Banco de Dados $dbName criado com sucesso <br>";

        $tabela = "CREATE  TABLE `code.php`.$tableName (
                  `id` INT NOT NULL AUTO_INCREMENT ,
                  `pagina` VARCHAR(100) NOT NULL ,
                  `titulo` VARCHAR(100) NULL ,
                  `conteudo` TEXT NULL ,
                  PRIMARY KEY (`id`) );";
        $conexao->exec($tabela);
        echo "Tabela $tableName criada com sucesso.";
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
    return $conexao;
}
criarDataBase();



$conexao = conectarDB();

try {
    $cadastrar = $conexao->prepare("TRUNCATE table paginas");
    $cadastrar->execute();

    $cadastrar = $conexao->prepare("INSERT INTO paginas (pagina,titulo,conteudo) VALUES ('home','Página Inicial','Conteúdo da página inicial')");
    $cadastrar->execute();

    $cadastrar = $conexao->prepare("INSERT INTO paginas (pagina,titulo,conteudo) VALUES ('empresa','Página Empresa','Conteúdo da página servicos')");
    $cadastrar->execute();

    $cadastrar = $conexao->prepare("INSERT INTO paginas (pagina,titulo,conteudo) VALUES ('produtos','Página Produtos','Conteúdo da página produtos')");
    $cadastrar->execute();

    $cadastrar = $conexao->prepare("INSERT INTO paginas (pagina,titulo,conteudo) VALUES ('servicos','Página Serviços','Conteúdo da página serviços')");
    $cadastrar->execute();

    $cadastrar = $conexao->prepare("INSERT INTO paginas (pagina,titulo,conteudo) VALUES ('contato','Página Contato','Conteúdo da página contato')");
    $cadastrar->execute();
}
catch (\PDOException $e) {
    echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
}