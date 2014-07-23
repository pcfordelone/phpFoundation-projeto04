<?php

function getURL() {
    $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = $rota['path'];
    $path = explode("/",$path);
    $path_str = $path[1];
    $rotasValidas = ['home','empresa','produtos','servicos','contato'];

    if (empty($path_str)) {
        return $dados = getDados('home');
    }
    elseif (in_array($path_str, $rotasValidas)) {
        ///require_once("pages/" . $path_str . ".php");
        return $dados = getDados($path_str);
    } else {
        require_once("pages/404.php");
    }
}

/*$teste = getURL();
print_r($teste);*/
