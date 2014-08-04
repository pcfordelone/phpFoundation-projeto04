<?php

session_start();

if (!isset($_SESSION['logado'])) {
    $user = $_REQUEST['user'];
    $senha = $_REQUEST['password'];

    if ($user=="admin" and $senha==12345) {
        $_SESSION['logado'] = true;
        require_once("pages/header.php");
        require_once("functions/rota.php");
        getURL();
    } else {
        header("location: ../");
    }
}
else {
    require_once("pages/header.php");
    require_once("functions/rota.php");
    getURL();
}



?>