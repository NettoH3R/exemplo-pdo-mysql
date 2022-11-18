<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$genero = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);

    $genero = $comando->fetch(PDO::FETCH_ASSOC);
} else {
    $comando = $bd->prepare('DELETE FROM generos WHERE id = :id');
    $comando->execute([':id' => $_POST['id']]);

    header('Location:/index.php');
}

include('./includes/header.php');
?>

<h1>Remover Gênero</h1>
<p>Tem certeza que deseja excluir o gênero "<?= $genero['nome'] ?>"</p>
<div class="form-group">
    <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?= $genero['id'] ?>" />
</div>
<br />

<button type="submit" class="btn btn-danger">Excluir</button>
<a href="index.php" class="btn btn-secondary">Voltar</a>
</form>

<?php include('./includes/footer.php'); ?>