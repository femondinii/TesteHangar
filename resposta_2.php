<?php 
    
    try {
        $pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');
    } catch(PDOException $e) {
        echo "Erro ao conectar com o banco de dados" . $e->getMessage();
        exit();
    }

    $sql = "SELECT user.user_name AS Name, user.user_city AS City, user.user_country AS Country, orders.order_date AS Date, orders.order_total AS Total
            FROM user
            JOIN orders ON user.user_id = orders.order_user_id
            WHERE user.user_id IN (1, 3, 5)
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
    <title>Consulta de dados</title>
</head>
<body>
    <h1>Consulta de dados</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Country</th>
                <th>Date</th>
                <th>Total</th>
            </tr>
            <?php
            // Exibe os resultados em uma tabela HTML
            foreach ($results as $row) {
                echo "<tr><td>{$row['Name']}</td><td>{$row['City']}</td><td>{$row['Country']}</td><td>{$row['Date']}</td><td>{$row['Total']}</td></tr>";
            }
            ?>
        </table>
</body>
</html>