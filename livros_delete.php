<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM livros WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);

    $livros = $comando->fetch(PDO::FETCH_ASSOC);
} else {
    $comando = $bd->prepare('DELETE FROM livros WHERE id = :id');
    $comando->execute([':id' => $_POST['id']]);

    header('Location:/livros_list.php');
}

include('./includes/header.php');
?>

<h1>Remover Gênero</h1>
<p>Tem certeza que deseja excluir o Livro "<?= $livros['titulo'] ?>"</p>
<form action="delete.php" method="post">
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $livros['id'] ?>" />
    </div>
    <br />

    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</form>

<?php include('./includes/footer.php'); ?>