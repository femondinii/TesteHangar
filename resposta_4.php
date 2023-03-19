<?php 
    try {
        $pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');
    } catch(PDOException $e) {
        echo "Erro ao conectar com o banco de dados" . $e->getMessage();
        exit();
    }

    $sql = "SELECT user.user_country, SUM(orders.order_total) AS Total
            FROM user
            INNER JOIN orders ON user.user_id = orders.order_user_id
            ORDER BY user.user_name";

    $stms = $pdo->query($sql);
    $results = $stms->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total de vendas</title>
</head>
<body>
    <h1>Total de vendas</h1>
        <table>
            <tr>
                <th>Country</th>
                <th>Total</th>
            </tr>
            <?php
            // Exibe os resultados em uma tabela HTML
            foreach ($results as $row) {
                echo "<tr><td>{<td>{$row['user_country']}<td>{$row['Total']}</td></tr>";
            }
            ?>
        </table>
</body>
</html>