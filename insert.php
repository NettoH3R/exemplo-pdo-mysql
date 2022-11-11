<?php
    require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $comando = $bd->prepare('INSERT INTO generos(nome) V');
    $comando->execute([':id'=> $_GET['id']]);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Gênero</title>
</head>
<body>
    
</body>
</html>