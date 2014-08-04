<?php

session_start();
$user = $_REQUEST['user'];
$senha = $_REQUEST['password'];

if ($user=="admin" and $senha==12345) {
    $_SESSION['logado'] = true;
    header("location: painel/");
} else {
    header("location: index.php?erro=usuario e/ou senha incorretos.");
}