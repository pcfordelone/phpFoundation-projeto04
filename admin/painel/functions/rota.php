<?php

function getURL() {
    $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = $rota['path'];
    $path = explode("/",$path);
    $path_str = $path[3];
    $rotasValidas = ['paginas','editPags','logout.php'];

    if ($path_str == "") { require_once("pages/paginas.php"); }
        elseif (in_array($path_str, $rotasValidas)) { require_once("pages/".$path_str.".php"); }
        else { require_once("pages/404.php"); }
}