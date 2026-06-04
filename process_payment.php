<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Pagar con PayPal</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Finalizar Compra</h1>
        <p>Total a pagar: <strong>$100.00</strong></p>
        
        <div id="paypal-button-container" style="max-width: 300px; margin: 20px auto;"></div>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: { value: '100.00' }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Pago completado con éxito por ' + details.payer.name.given_name);
                });
            }
        }).render('#paypal-button-container'); // Aquí busca el DIV para mostrar el botón
    </script>
</body>
</html>