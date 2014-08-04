<?php
session_start();
if (!isset($_SESSION['logado'])) :

?>

<!DOCTYPE html>
<html>
<head>
    <title>Site Simples - Administrador</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/admin.css" type="text/css" />

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" />

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h3><?php if(isset($_GET['erro'])) : echo $_GET['erro']; endif; ?></h3>
            <h1 class="text-center login-title">Faça o login para continuar</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">
                <form class="form-signin" action="painel/" method="post">
                    <input type="text" name="user" class="form-control" placeholder="Usuário" required autofocus>
                    <input type="password" name="password" class="form-control" placeholder="Senha" required>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php else :
    header("location: http://localhost:8000/admin/painel/");
    endif;
?>