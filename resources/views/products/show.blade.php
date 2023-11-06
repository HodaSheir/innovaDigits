<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $product->name }}</h4>
                <p class="card-text">{{ $product->description }}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Price:</strong> ${{ $product->price }}</li>
                    <li class="list-group-item"><strong>Quantity:</strong> {{ $product->quantity }}</li>
                    <li class="list-group-item"><strong>Expiration Date:</strong> {{ $product->expiration_date }}</li>
                    <li class="list-group-item"><strong>Vendor:</strong> {{ $product->vendor->company_name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
