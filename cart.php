<?php 
include 'db_connection.php'; 

// Consulta para traer los productos y el ID del registro en el carrito
$query = "SELECT c.id as cart_id, p.name, p.price 
          FROM cart_items c 
          JOIN products p ON c.product_id = p.id";
$stmt = $pdo->query($query);
$carrito = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Cálculo del total
$total = 0;
foreach ($carrito as $item) {
    $total += $item['price'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Tu Carrito</title>
</head>
<body>
    <nav>
        <a href="index.php">Volver al catálogo</a>
    </nav>
    
    <h1>Productos en tu Carrito</h1>
    
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($carrito as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['name']); ?></td>
            <td>$<?php echo number_format($item['price'], 2); ?></td>
            <td>
                <a href="remove_from_cart.php?id=<?php echo $item['cart_id']; ?>" 
                   style="color: #ff4d4d; text-decoration: none; font-weight: bold;">
                   Eliminar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        
        <tr style="background-color: #e0f7f6; font-weight: bold;">
            <td>TOTAL A PAGAR</td>
            <td>$<?php echo number_format($total, 2); ?></td>
            <td></td>
        </tr>
    </table>

    <div style="text-align: center; margin-top: 20px;">
        <form action="process_payment.php" method="POST">
            <button type="submit" class="pay-button">Proceder al Pago</button>
        </form>
    </div>
</body>
</html>