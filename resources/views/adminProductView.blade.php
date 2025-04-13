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
            <img src="{{ $product['image_url'] }}" alt="Product Image" class="img-fluid rounded mb-3">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="list-style-position: inside; text-align: left; padding-left: 0; margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Product Edit Form -->
            <form action="/admin-update-product" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="productName" class="form-control" value="{{ $product['name'] }}" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="productDescription" class="form-control" >{{ $product['description'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price ($)</label>
                    <input type="number" name="price" class="form-control" step="0.01" value="{{ $product['price'] }}" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Image Url: </label>
                    <input type="text" name="imageUrl" class="form-control" value="{{ $product['image_url'] }}" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <div class="d-flex align-items-center">
                        <button type="button" class="quantity-btn" onclick="adjustQuantity(-1)">-</button>
                        <input type="number" name="quantity" id="quantity" class="form-control text-center mx-2" style="width: 80px;" value="{{ $product['quantity'] }}">
                        <button type="button" class="quantity-btn" onclick="adjustQuantity(1)">+</button>
                    </div>
                </div>

                <!-- Product Type Dropdown -->
                <div class="form-group">
                    <label for="productType">Product Type:</label>
                    <select class="form-control" id="productType" name="productType">
                        <option value="">Select Product Type</option>
                        @foreach($productTypes as $type)
                            <option value="{{ $type->id }}" 
                                {{ $type->id == $product->product_type ? 'selected' : '' }}>
                                {{ $type->product_type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Company Association Dropdown -->
                <div class="form-group">
                    <label for="companyAssociation">Company Association:</label>
                    <select class="form-control" id="companyAssociation" name="companyAssociation">
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}"
                                {{ $company->id == $product->company_association ? 'selected' : '' }}>
                                {{ $company->company_association }}
                            </option>
                        @endforeach
                    </select>
                </div>


            <!-- Show Save button only if user can update products -->
            @can('update-product')
            <div class="mt-4">
                <button type="submit" class="btn btn-success w-100">Save Changes</button>
            </div>
            @endcan
            </form>

            <!-- Delete Button -->
             @can('delete-product')
            <form action="/admin-delete-product" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <button type="submit" class="btn btn-danger w-100 mt-2">Delete Product</button>
            </form>
            @endcan

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

    </script>
</body>
</html>