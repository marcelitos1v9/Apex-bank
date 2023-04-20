<?php
include("../models/conexao.php");

$nome_pesquisa = $_GET['Nome_pesquisa'];

$sql = "SELECT * FROM clients WHERE nome LIKE '%$nome_pesquisa%'";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuários</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <?php while ($exibe = mysqli_fetch_array($resultado)) { ?>
            <tr>
                <td><?php echo $exibe['id']; ?></td>
                <td><?php echo $exibe['nome']; ?></td>
                <td><?php echo $exibe['email']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
