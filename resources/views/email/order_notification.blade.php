<!DOCTYPE html>
<html>
<head>
    <title>New Order Notification</title>
</head>
<body>
    <h1>New Order Notification</h1>
    
    <p>Dear Vendor,</p>
    
    <p>A new order has been placed with the following details:</p>
    
    <ul>
        <li>Order Number: {{ $order->order_number }}</li>
        <li>Shipping Address: {{ $order->shipping_address }}</li>
        <li>Billing Address: {{ $order->billing_address }}</li>
        <li>Payment Method: {{ $order->payment_method }}</li>
    </ul>
    
    <h2>Order Items:</h2>
    
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $orderProduct)
                <tr>
                    <td>{{ $orderProduct->name }}</td>
                    <td>{{ $orderProduct->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <p>Thank you for your attention!</p>
</body>
</html>
