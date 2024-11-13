<!DOCTYPE html>
<html>
<head>
    <title>Thank you for shopping with us</title>
</head>
<body>
    <h1>Order placed</h1>
    <p>Dear {{ $data['customerName'] }},</p>
    <p>Your order has been placed! Thank you for shopping with us.</p>
    <p>Order Details:</p>
    <ul>
        <li>Order ID: {{ $data['last_id'] }}</li>
        <li>Delivery date: {{ $data['date'] }}</li>
    </ul>
    <p>Regards,</p>
    <p>Tharayil Opticals</p>
</body>
</html>
