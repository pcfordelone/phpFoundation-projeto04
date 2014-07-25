<?php

function getURL() {
    $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = $rota['path'];
    $path = explode("/",$path);
    $path_str = $path[1];
    $rotasValidas = ['home','empresa','produtos','servicos'];

    if (empty($path_str)) {
        return $dados = getDados('home');
    }
    elseif (in_array($path_str, $rotasValidas)) {
        ///require_once("pages/" . $path_str . ".php");
        return $dados = getDados($path_str);
    } elseif ($path_str=='busca' and isset($_POST['keyword'])) {
        require_once("pages/busca.php");
    } elseif ($path_str=="contato") {
        require_once("pages/contato.php");
    }
    else {
        require_once("pages/404.php");
    }
}