<?php include('./includes/header.php');

require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$livro = null;


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos');
    $comando->execute();

    $generos = $comando->fetchAll(PDO::FETCH_ASSOC);

    $comandoLivro = $bd->prepare('SELECT * FROM livros WHERE id = :id');
    $comandoLivro->execute([':id' => $_GET['id']]);
    $livro = $comandoLivro->fetch(PDO::FETCH_ASSOC);
    var_dump($generos);
} else {

}
?>

<h1>Novo Livro</h1>

<form action="livros_insert.php" method="post">
    <div class="from-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="titulo" value="<?= $livro['titulo'] ?>">
    </div>

    <div>
        <label for="genero">Gêneros</label>
        <select name="genero" class="form-control">
            <?php foreach ($generos as $g) : ?>
                <option <?php ($g['id'] == $livro['id_genero']) ? 'selected' : '' ?> value="<?= $g['id'] ?>"><?= $g['nome'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <br />
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</form>

<?php include('./includes/footer.php'); ?>