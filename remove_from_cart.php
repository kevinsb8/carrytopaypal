<?php
include 'db_connection.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE id = ?");
    $stmt->execute([$id]);
    
    // Regresamos al carrito después de eliminar
    header("Location: cart.php");
    exit();
}
?>