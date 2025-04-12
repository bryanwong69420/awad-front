<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>
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
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }

        #adminAddProduct {
            background-image: url("/pic/back/back.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        /* Error Message */
        .alert {
            width: 100%;
            margin: 10px auto;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .btn-primary:hover {
            background: darkblue; border-color:white;
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
    <section id="adminAddProduct">
    <div class="container mt-5">
        <h2>Add New Product</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style-position: inside; text-align: left; padding-left: 0; margin-bottom: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('adminStoreProduct') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" id="productName" name="productName">
            </div>

            <div class="form-group">
                <label for="productDescription">Product Description:</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" min="0">
            </div>

            <div class="form-group">
                <label for="imageLink">Product Image Link:</label>
                <input type="text" class="form-control" id="imageLink" name="imageLink">
            </div>
            
            <!-- Product Type Dropdown -->
            <div class="form-group">
                <label for="productType">Product Type:</label>
                <select class="form-control" id="productType" name="productType">
                    <option value="">Select Product Type</option>
                    @foreach($productTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->product_type }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Company Association Dropdown -->
            <div class="form-group">
                <label for="companyAssociation">Company Association:</label>
                <select class="form-control" id="companyAssociation" name="companyAssociation">
                    <option value="">Select Company</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->company_association }}</option>
                    @endforeach
                </select>
            </div>
            <div class="submit-button">
                <button type="submit" class="btn btn-primary btn-block">Add Product</button>
                <a href="{{ url('/admin') }}" class="btn btn-secondary btn-block">Cancel</a>
            </div>
        </form>
    </div>
    </section>
</body>
</html>
