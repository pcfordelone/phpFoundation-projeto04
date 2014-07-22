<div class="row clearfix">
    <div class="col-md-12 column">
        <h3>
            Fale Conosco
        </h3>

        <?php if(!isset($_REQUEST['submit'])): ?>
            <p>
                Entre em contato conosco que, em breve, entraremos em contato, obrigado.
            </p>
            <form role="form" action="index.php?pages=contato" method="POST">
                <div class="form-group">
                    <label for="inputNome">Nome:</label><input type="text" class="form-control" id="inputNome" name="inputNome" />
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email:</label><input type="email" class="form-control" id="inputEmail" name="inputEmail"/>
                </div>
                <div class="form-group">
                    <label for="inputAssunto">Assunto:</label><input type="text" class="form-control" id="inputAssunto" name="inputAssunto"/>
                </div>
                <div class="form-group">
                    <label for="inputMessage">Mensagem:</label><textarea class="form-control" id="inputMessage" name="inputMessage"></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Enviar" />
            </form><br><br>
            <?php else:
            $origem = "contato@fordelone.com.br";
            $destino = "contato@fordelone.com.br";
            $assunto = $_REQUEST['inputAssunto'];

            $texto = "<h3>Formulário de Contato</h3><hr/>";
            $texto.= "<h4>Dados Pessoais:</h4>";
            $texto.= "<b>Nome: </b>".$_REQUEST['inputNome']."<br/>";
            $texto.= "<b>E-mail: </b>".$_REQUEST['inputEmail']."<br/>";
            $texto.= "<b>Assunto: </b>".$_REQUEST['inputAssunto']."<br/><br/><hr/>";

            $texto.= "<h4>Mensagem:</h4>";
            $texto.= "<b>Mensagem: </b>".$_REQUEST['inputMessage']."<br/><br/><hr/>";

            $headers = "MIME-Version: 1.1\n";
            $headers .= "Content-type: text/html; charset=UTF-8\n";
            $headers .= "Content-Transfer-Encoding: 8bit\n";
            $headers .= "From: ".$origem."\n";
            $headers .= "Organization: Fordelone \n";
            $headers .= "Reply-To: ".$_REQUEST['inputEmail']."\n";
            $headers .= "Return-Path: ".$origem. "\n";
            $headers .= "BCC: pc@fordelone.com.br"."\n";

#mail($destino, $assunto, $texto, $headers,"-r".$origem);

            print ("<p>Sua mensagem foi enviada com sucesso. Obrigado.</p>"."<br>".$texto);

            ?>

        <?php endif ?>
    </div>
</div>