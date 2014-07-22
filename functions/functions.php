<?php

function getURL() {
    $rotasValidas = ['home','empresa','produtos','servicos','contato'];

    if (!isset($_GET['pages'])) {
        require_once("pages/home.php");
    }
    elseif (in_array($_GET['pages'], $rotasValidas)) {
        require_once("pages/" . $_GET['pages'] . ".php");
    } else {
        require_once("pages/404.php");
    }
}
