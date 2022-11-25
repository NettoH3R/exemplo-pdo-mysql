<?php include('./includes/header.php');

require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos');
    $comando->execute();

    $generos = $comando->fetchAll(PDO::FETCH_ASSOC);
} else {
    $comando = $bd->prepare('INSERT INTO livros(titulo, id_genero) VALUES (:titulo, :genero)');
    $comando->execute([':titulo' => $_POST['titulo'], ':genero' => $_POST['genero']]);

    header('Location:/livros_list.php');
}
?>

<h1>Novo Livro</h1>

<form action="livros_insert.php" method="post">
    <div class="from-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="titulo">
    </div>

    <div>
        <label for="genero">Gêneros</label>
        <select name="genero" class="form-control">
            <?php foreach ($generos as $g) : ?>
                <option value="<?= $g['id'] ?>"><?= $g['nome'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <br />
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</form>

<?php include('./includes/footer.php'); ?>