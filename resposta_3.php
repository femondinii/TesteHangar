<?php 
    
    try {
        $pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');
    } catch(PDOException $e) {
        echo "Erro ao conectar com o banco de dados" . $e->getMessage();
        exit();
    }

    $sql = "UPDATE User
            SET user_country = 'Canada'
            WHERE user_id = 4";
    

    $stms = $pdo->query($sql);

    if($stms->execute()){
        echo "<p>Campo Country foi atualizado com sucesso!</p>";
    } else {
        echo "<p>Erro ao atualizar campo.</p>";
    }
?>
