<?php 
    try {
        $pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');
    } catch(PDOException $e) {
        echo "Erro ao conectar com o banco de dados" . $e->getMessage();
        exit();
    }

    $sql = "SELECT orders.order_id, orders.order_user_id, user.user_name, orders.order_total, orders.order_date 
            FROM orders 
            JOIN user ON orders.order_user_id=user.user_id 
            ORDER BY orders.order_id";

    $stms = $pdo->query($sql);
    $stms->execute();
    $results = $stms->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pedidos</title>
    <style>
        table {
        border-collapse: collapse;
        width: 100%;
      }
      th, td {
        text-align: left;
        padding: 8px;
      }
      th {
        background-color: #333;
        color: white;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
    </style>
</head>
<body>
<h1>Lista de Pedidos</h1>
    <table>
      <thead>
        <tr>
          <th>ID do Pedido</th>
          <th>ID do Usuário</th>
          <th>Nome do Usuário</th>
          <th>Total do Pedido</th>
          <th>Data do Pedido</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            if (count($results) > 0) {
                foreach($results as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["order_id"] . "</td>";
                    echo "<td>" . $row["order_user_id"] . "</td>";
                    echo "<td>" . $row["user_name"] . "</td>";
                    echo "<td>" . $row["order_total"] . "</td>";
                    echo "<td>" . $row["order_date"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum pedido encontrado.</td></tr>";
            }       
        ?>
      </tbody>
</body>
</html>