<meta charset="UTF-8" />
<?php

require_once("database.php");

function searchDados() {
    $conexao = conectarDB();
    $keyword = $_POST['keyword'];
    $busca = '%'.$keyword.'%';

    try {
        $query = $conexao->prepare("SELECT * FROM paginas WHERE conteudo LIKE :busca");
        $query->bindValue(":busca",$busca);
        $query->execute();
        $resultado = $query->rowCount();
    }
    catch (\PDOException $e) {
        echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
    }
    if ($resultado >= 1) {
        $dados = $query->fetchAll(PDO::FETCH_ASSOC);
        echo "<p>A palavra '".$keyword."' retornou <b>".$query->rowCount()."</b> resultados</p><br>";
        foreach ($dados as $value) {
            echo
                "<p><b><a href='".$value['pagina']."'>".$value['pagina']."</a></b><br>".
                $value['conteudo']."</p>"
            ;
        }
    } else {
        echo "<p>A palavra '".$keyword."' retornou <b>".$query->rowCount()."</b> resultados</p><br>";
    }
}