<?php

if (!isset($_POST['submit'])) :
    $conteudo = getDados("paginas",$_GET['pagina']);
?>

<div class="row clearfix">
    <div class="col-md-4 column">
        <ul class="nav nav-stacked nav-pills">
            <li><a href="#">Páginas</a></li>
        </ul>
    </div>
    <div class="col-md-8 column">
        <?php echo ("<h3>Editando página: ".$_GET['pagina']."</h3>") ?>
        <form action="editPags" method="post">
            <div class="form-group">
                <label for="inputTitulo">Título da Página:</label><input type="text" class="form-control" name="inputTitulo" value="<?php echo($conteudo['titulo']); ?>" /><br>
                <input type="text" class="form-control hidden" name="pagina" value="<?php echo($_GET['pagina']); ?>"
            </div>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                <?php echo($conteudo['conteudo']); ?>
            </textarea>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
            <br>
            <input type="submit" name="submit" class="btn btn-success" value="Atualizar" />
        </form>
    </div>
</div>
</div>
</body>
</html>

<?php else :
    alterarDados("paginas",[$_POST['inputTitulo'],$_POST['editor1'],$_POST['pagina']]);
    header('Location: paginas');
?>

<?php endif ?>