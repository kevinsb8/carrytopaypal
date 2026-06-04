<?php
include 'db_connection.php';
if(isset($_POST['product_id'])) {
    $id = $_POST['product_id'];
    // Asegúrate de que las columnas coincidan con tu tabla cart_items
    $stmt = $pdo->prepare("INSERT INTO cart_items (product_id, quantity, user_id) VALUES (?, 1, 1)");
    if($stmt->execute([$id])) {
        echo "Producto añadido correctamente.";
    } else {
        echo "Error al insertar.";
    }
}
?>