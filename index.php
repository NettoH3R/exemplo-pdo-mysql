<?php
require_once './vendor/autoload.php';

use PDO;

$bd = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();
$generos = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>biblioteca</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <table class="table table-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
        </tr>
        <?php foreach ($generos as $g) : ?>
            <tr>
                <td><?= $g['id'] ?></td>
                <td><?= $g['nome'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>