<?php

require_once "conexoes.php";

// Criar Banco de Dados -------------------- //
function criarDataBase($dns,$user,$key,$dbName) {
    try {
        $conexao = new PDO($dns,$user,$key);
        $conexao->query("CREATE DATABASE IF NOT EXISTS $dbName");
        $conexao->query("use $dbName");
        echo "<p>Banco de Dados <b>{$dbName}</b> criado com sucesso</p>";
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
};

// Criar tabelas no banco -------------------- //
function criarTabela($query) {
    $pdo = conectarDB();

    try {
        $criarTabela = $pdo->prepare($query);
        $criarTabela->execute();
    }
    catch (PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
}


// Limpar Tabela DB ------------------------ //
function truncateTable($tabela) {
    $conexao = conectarDB();

    try {
        $truncate = $conexao->prepare("TRUNCATE table $tabela");
        $truncate->execute();
    }
    catch (PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
    return $truncate;
};

// Cadastrar Dados no DB ------------------------ //
function cadastro($pagina,$conteudo) {
    $pdo = conectarDB();
    $campos = count($conteudo);
    try {
        $cadastrar = $pdo->prepare("INSERT INTO `code.php`.{$pagina} (`pagina`, `titulo`, `conteudo`) VALUES (?, ?, ?);
");
        for ($i=0;$i<$campos;$i++) {
            $cadastrar->bindValue($i+1,$conteudo[$i]);
        }
        $cadastrar->execute();

        if ($cadastrar->rowCount()==1) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
}

// Criando Usuário e Senha Banco de Dados ----------------- //
function criarUser() {
    $usuario = "admin";
    $senha = password_hash("12345",PASSWORD_DEFAULT);
    $pdo = conectarDB();
    try {
        $user = $pdo->prepare("INSERT INTO `code.php`.`admin` (`usuario`, `senha`) VALUES (:usuario, :senha);");
        $user->bindValue("usuario",$usuario);
        $user->bindValue("senha",$senha);
        $user->execute();
    } catch (PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
}

// Resgatar Users e Senhas ------------------------ //
function getPass() {
    $pdo = conectarDB();
    $user = "admin";
    try {
        $usuario = $pdo->prepare("Select * from admin where usuario = :user");
        $usuario->bindValue(":user",$user);
        $usuario->execute();
        $dados = $usuario->fetch(PDO::FETCH_ASSOC);
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
    return $dados;
}
/*$teste = getPass();
$senha = $teste['senha'];
echo $senha;

if (password_verify(12345, $senha)) {
    echo "ok";
}*/



// Alterar Dados no Banco de Dados ------------------------ //
function alterarDados($tabela,$conteudo) {
    $pdo = conectarDB();
    $campos = count($conteudo);

    try {
        $alterar = $pdo->prepare("UPDATE `code.php`.`paginas` SET `titulo`=?, `conteudo`=? WHERE `pagina`=?;");
        for ($i=0;$i<$campos;$i++) {
            $alterar->bindValue($i+1,$conteudo[$i]);
        }
        $alterar->execute();

        if ($alterar->rowCount()==1) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
}


// Apagar Dados no Banco de Dados ------------------------ //
function apagarDados($tabela, $pagina) {
    $pdo = conectarDB();

    try {
        $query = "DROP TABLE `code.php";
        $alterar = $pdo->prepare($query);

        for ($i=0; $i < $campos ; $i++) {
            $alterar->bindValue($i+1,$conteudo[$i]);
        }
        $alterar->execute();
    }
    catch (PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
}

// Resgatar Dados no Banco de Dados ------------------------ //
function getDados($tabela, $pagina) {
    $conexao = conectarDB();

    try {
        $busca = $conexao->prepare("Select * from {$tabela} where pagina = :pag");
        $busca->bindValue(":pag",$pagina);
        $busca->execute();
        $dados = $busca->fetch(PDO::FETCH_ASSOC);
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
    return $dados;
}

function listarDados() {
    $conexao = conectarDB();

    try {
    $query = $conexao->prepare("SELECT * FROM paginas");
    $query->execute();
    $resultado = $query->rowCount();
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }

    if ($resultado >= 1) {
        $dados = $query->fetchAll(PDO::FETCH_ASSOC);
        //print_r($dados);
        /*foreach ($dados as $value) {
            //echo "<p><b><a href='".$value['pagina']."'>".$value['pagina']."</a></b><br>".$value['conteudo']."</p>";
            print_r($value);
        }*/
    } return $dados;
}

?>