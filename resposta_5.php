<?php 
    try {
        $pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');
    } catch(PDOException $e) {
        echo "Erro ao conectar com o banco de dados" . $e->getMessage();
        exit();
    }

    $sql = "SELECT DATE_FORMAT(order_date, '%Y-%m') AS Month,
            SUM(order_total) AS Total 
            FROM orders 
            GROUP BY Month";

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
    <h1>Total de vendas MÊS/ANO</h1>
        <table>
            <tr>
                <th>MÊS/ANO</th>
                <th>Total</th>
            </tr>
            <?php
            // Exibe os resultados em uma tabela HTML
            foreach ($results as $row) {
                echo "<tr><td>{<td>{$row['Month']}<td>{$row['Total']}</td></tr>";
            }
            ?>
        </table>
</body>
</html>