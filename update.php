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
    $comando = $bd->prepare('UPDATE generos SET nome = :nome WHERE id = :id');
    $comando->execute([':nome' => $_POST['nome'], ':id' => $_POST['id']]);

    header('Location:/index.php');
}

include('./includes/header.php')
?>


<div class="form-group">
    <h1>Alterar Gênero</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $genero['id'] ?>">
        <label for="nome">Nome do Gênero</label>
        <input type="text" required name="nome" value="<?= $genero['nome'] ?>">
</div>
<br />
<button type="submit" class="btn btn-success">Salvar</button>
<a href="index.php" class="btn btn-secondary">Voltar</a>
</form>

<?php include('./includes/footer.php'); ?>