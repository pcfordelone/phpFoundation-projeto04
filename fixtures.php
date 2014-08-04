<meta charset="UTF-8";

<?php

require_once "functions/database.php";
require_once "functions/conexoes.php";

// Criando o banco de dados code.php ------------------------- //
criarDataBase("mysql:host=localhost","root","root","`code.php`");


// Criando as tabelas e inserindo conteúdo no banco ------------------------- //
criarTabela("CREATE  TABLE `code.php`.`paginas` (`id` INT NOT NULL AUTO_INCREMENT ,`pagina` VARCHAR(100) NOT NULL ,`titulo` VARCHAR(100) NULL ,`conteudo` TEXT NULL ,PRIMARY KEY (`id`) );");
criarTabela("CREATE  TABLE `code.php`.`admin` (`id` INT NOT NULL AUTO_INCREMENT ,`usuario` VARCHAR(10) NOT NULL ,`senha` VARCHAR(100) NULL ,PRIMARY KEY (`id`) );");

truncateTable("paginas");
truncateTable("admin");
cadastro('paginas',['home','Página Inicial','Conteúdo da página inicial']);
cadastro('paginas',['empresa','Página Empresa','Conteúdo da página empresa']);
cadastro('paginas',['produtos','Página Produtos','Conteúdo da página produtos']);
cadastro('paginas',['servicos','Página Serviços','Conteúdo da página serviços']);

// Criando usuário Admin e Senha ------------------------- //
criarUser();