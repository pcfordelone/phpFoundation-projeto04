<div class="row clearfix">
    <div class="col-md-4 column">
        <ul class="nav nav-stacked nav-pills">
            <li><a href="#">Páginas</a></li>
        </ul>
    </div>
    <div class="col-md-8 column">
        <h3>Lista de Páginas</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="active">
                <tr>
                    <th>ID</th>
                    <th>Página</th>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                <?php

                $lista = listarDados();
                foreach ($lista as $value) : ?>
                    <tr class="active" >
                    <td><?php echo ($value['id']); ?></td>
                    <td><?php echo ($value['pagina']); ?></td>
                    <td><?php echo ($value['titulo']); ?></td>
                    <td>OK</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" disabled>Remover</button>
                        <a href="editPags?pagina=<?php echo $value['pagina']; ?>">
                        <button type="button" class="btn btn-warning btn-sm">Editar</button>
                        </a>
                    </td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</body>
</html>