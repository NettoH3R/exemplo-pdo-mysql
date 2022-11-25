<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;
use PDO;

$bd = new MySQLConnection;

$comando = $bd->prepare('SELECT L.id, L.titulo, G.nome FROM livros L inner join generos G on L.id_genero = G.id');
$comando->execute();
$livros = $comando->fetchAll(PDO::FETCH_ASSOC);

include('./includes/header.php');
?>


<table class="table table-dark">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Gênero</th>
        <th><a href="livro_insert.php"><button type="button" class="btn btn-secondary">+</button></a></th>
    </tr>
    <?php foreach ($livros as $l) : ?>
        <tr>
            <td><?= $l['id'] ?></td>
            <td><?= $l['titulo'] ?></td>
            <td><?= $l['nome'] ?></td>
            <td>
                <a href="livros_update.php?id=<?= $g['id']  ?>"><button type="button" class="btn btn-success">Editar</button></a>
                <a href="livros_delete.php?id=<?= $g['id']  ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
            </td>
        </tr>
    <?php endforeach ?>
</table>

<?php include('./includes/footer.php'); ?>