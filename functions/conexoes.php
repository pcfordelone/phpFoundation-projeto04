<?php

function conectarDB(){
    $dns = "mysql:host=localhost;dbname=code.php";
    $user = "root";
    $senha = "root";
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];

    try {
        $conexao = new PDO($dns,$user,$senha,$options);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
    return $conexao;
}