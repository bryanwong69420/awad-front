<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-***" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center; 
            background-color: #f8f9fa;
            padding-top: 80px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        .quantity-btn {
            font-size: 18px;
            width: 40px;
            height: 40px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .quantity-btn:hover {
            background-color: #0056b3;
        }

        .btn-success:hover {
            background: darkgreen; border-color:white;
            transform: scale(1.02);
        }

        .btn-danger:hover {
            background: darkred; border-color:white;
            transform: scale(1.02);
        }

        .btn-secondary:hover {
            background: darkgrey; border-color:white;
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    @include('adminNavigation')

    <div class="container mt-4">
        <h2>Edit Product</h2>
        <div class="card shadow p-4">
            <!-- Product Image -->
            <img src="{{ $product['image'] }}" alt="Product Image" class="img-fluid rounded mb-3">

            <!-- Product Edit Form -->
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="productName" class="form-control" value="{{ $product['productName'] }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="productDescription" class="form-control" required>{{ $product['productDescription'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price ($)</label>
                    <input type="number" name="price" class="form-control" step="0.01" value="{{ $product['price'] }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <div class="d-flex align-items-center">
                        <button type="button" class="quantity-btn" onclick="adjustQuantity(-1)">-</button>
                        <input type="number" name="quantity" id="quantity" class="form-control text-center mx-2" style="width: 80px;" value="{{ $product['quantity'] }}" required>
                        <button type="button" class="quantity-btn" onclick="adjustQuantity(1)">+</button>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success w-100">Save Changes</button>
                </div>
            </form>

            <!-- Delete Button -->
            <form action="" method="POST" onsubmit="return confirmDelete();">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <button type="submit" class="btn btn-danger w-100 mt-2">Delete Product</button>
            </form>

            <div>
                <a href="{{ url('/admin') }}" class="btn btn-secondary btn-block w-100 mt-2">Cancel</a>
            </div>
        </div>
    </div>

    <script>
        // Adjust quantity function
        function adjustQuantity(change) {
            let quantityInput = document.getElementById('quantity');
            let newValue = parseInt(quantityInput.value) + change;
            if (newValue >= 0) {
                quantityInput.value = newValue;
            }
        }

        // Confirm delete function
        function confirmDelete() {
            return confirm("Are you sure you want to delete this product?");
        }
    </script>
</body>
</html>