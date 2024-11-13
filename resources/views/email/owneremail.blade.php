<!-- resources/views/emails/order_placed.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .order-details {
            margin-top: 20px;
        }
        .order-details th {
            text-align: left;
            padding-right: 10px;
        }
        .order-details td {
            padding: 5px 0;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Order Details</h2>
        </div>

        <div class="order-details">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th>Customer Name:</th>
                    <td>{{ $emaildata['customerName'] }}</td>
                </tr>
                <tr>
                    <th>Customer Number:</th>
                    <td>{{ $emaildata['customerNumber'] }}</td>
                </tr>
                <tr>
                    <th>Sales ID:</th>
                    <td>{{ $emaildata['last_id'] }}</td>
                </tr>
                <tr>
                    <th>Order Date:</th>
                    <td>{{ $emaildata['date'] }}</td>
                </tr>
                <tr>
                    <th>Total Amount:</th>
                    <td>{{ $emaildata['total'] }}</td>
                </tr>
                <tr>
                    <th>Total after Discount:</th>
                    <td>{{ $emaildata['discount'] }}</td>
                </tr>
                <tr>
                    <th>Amount Paid:</th>
                    <td>{{ $emaildata['pay'] }}</td>
                </tr>
                <tr>
                    <th>Balance:</th>
                    <td>{{ $emaildata['balance'] }}</td>
                </tr>
                
                <tr>
                    <th>Payment Mode:</th>
                    <td>{{ $emaildata['payment'] }}</td>
                </tr>
               
            </table>
        </div>

       
    </div>

</body>
</html>
