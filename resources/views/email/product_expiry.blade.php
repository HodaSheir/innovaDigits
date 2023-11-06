<!DOCTYPE html>
<html>
<head>
    <title>Order Notification</title>
</head>
<body>
    <p>The product quantity is running low.</p>
    <a href="{{ url('/products/' . $product->id) }}">View Product</a>
    <p>Thank you for using our application!</p>
</body>
</html>
