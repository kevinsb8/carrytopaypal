<?php include 'db_connection.php'; 
$stmt = $pdo->query("SELECT * FROM products");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css"> <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Tienda</title>
</head>
<body>
    <nav style="text-align: center; margin: 20px;">
        <a href="index.php">Catálogo</a> | <a href="cart.php">Ver Carrito</a>
    </nav>
    <h1>Catálogo de Productos</h1>
    <table>
        <tr><th>Nombre</th><th>Precio</th><th>Acción</th></tr>
        <?php foreach ($productos as $p): ?>
        <tr>
            <td><?php echo htmlspecialchars($p['name']); ?></td>
            <td>$<?php echo htmlspecialchars($p['price']); ?></td>
            <td><button class="add-to-cart" data-id="<?php echo $p['id']; ?>">Añadir</button></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <script src="script.js"></script> </body>
</html>