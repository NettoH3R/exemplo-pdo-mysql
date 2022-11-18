<?php

require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new MySQLConnection();

    $comando = $bd->prepare('INSERT INTO generos(nome) VALUES (:nome)');
    $comando->execute([':nome' => $_POST['nome']]);

    header('Location:/index.php');
}

include('./includes/header.php');

?>

<h1>Novo Gênero</h1>
<form action="insert.php" method="POST">
    <div class="from-group">
        <label for="nome">Nome Gênero</label>
        <input type="text" required name="nome" />
    </div>
    <br />
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</form>

<?php include('./includes/footer.php'); ?>