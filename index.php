<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;
use PDO;

$bd = new MySQLConnection;

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();
$generos = $comando->fetchAll(PDO::FETCH_ASSOC);

include('./includes/header.php');
?>


<table class="table table-dark">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th><a href="insert.php"><button type="button" class="btn btn-secondary">+</button></a></th>
    </tr>
    <?php foreach ($generos as $g) : ?>
        <tr>
            <td><?= $g['id'] ?></td>
            <td><?= $g['nome'] ?></td>
            <td>
                <a href="update.php?id=<?= $g['id']  ?>"><button type="button" class="btn btn-success">Editar</button></a>
                <a href="delete.php?id=<?= $g['id']  ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
            </td>
        </tr>
    <?php endforeach ?>
</table>

<?php include('./includes/footer.php'); ?>