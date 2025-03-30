<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-***" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body { 
            
            font-family: 'Poppins', sans-serif; 
            text-align: center; 
            background-color: #f8f9fa; 
            padding-top: 80px; /* Prevent content hiding under navbar */
        }

        /* Admin Dashboard Section */
        #adminDashboard {
            background-image: url("/pic/back/back.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        /* Dashboard Container */
        .container { 
            max-width: 600px; 
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Section Borders */
        .section-box {
            border: 2px solid #007bff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: all 0.3s ease-in-out;
        }

        /* Hover Effect for Sections */
        .section-box:hover {
            background-color: #e9f5ff;
            transform: scale(1.02);
        }

        /* Buttons */
        .btn-custom { 
            padding: 12px 20px;
            display: block;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s ease-in-out;
            border: 2px solid transparent;
        }

        /* Button Colors */
        .btn-primary { background: blue; color: white; }
        .btn-primary:hover { background: darkblue; border-color: white; }

        .btn-danger { background: red; color: white; }
        .btn-danger:hover { background: darkred; border-color: white; }

        .btn-warning { background: orange; color: white; }
        .btn-warning:hover { background: darkorange; border-color: white; }

        /* Search Bar */
        input { 
            width: 100%; 
            padding: 10px; 
            margin-top: 10px; 
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        /* Search Button (Eye Icon) */
        #searchButton {
            display: inline-block;
            margin-top: 10px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        #searchButton:hover {
            transform: scale(1.1);
            color: darkblue;
        }

        /* Collapsible Edit Product Section */
        #editProductSection {
            display: none;
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
        </style>
        </head>
        <body>
        @include('adminNavigation')

        <section id="adminDashboard">
        <div class="container mt-4">
            <h1>Admin Dashboard</h1>

            <!-- Add Product Section -->
            <div class="section-box">
                <a href="{{ url('/adminAddProduct') }}" class="btn btn-primary btn-custom">
                    <i class="fa-solid fa-plus"></i> Add New Product
                </a>
            </div>

            <!-- Edit or Remove Product Section (Collapsible) -->
            <div class="section-box">
                <button id="editProductButton" class="btn btn-secondary btn-custom">
                    <i class="fa-solid fa-pen-to-square"></i> Edit or Remove Product
                </button>

                <div id="editProductSection" class="mt-3">
                    <input type="text" id="searchProduct" placeholder="Enter Product ID">
                    <button id="searchButton" class="btn btn-info btn-custom">
                        <i class="fa-solid fa-magnifying-glass"></i> Search
                    </button>
                </div>
            </div>

            <!-- View Feedback Section -->
            <div class="section-box">
                <a href="{{ url('/adminFeedback') }}" class="btn btn-warning btn-custom">
                    <i class="fa-solid fa-comments"></i> View Feedback
                </a>
            </div>

            <!-- Error Message -->
            @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        </section>

        <script>
        // Show/Hide "Edit or Remove Product" Section
        document.getElementById("editProductButton").addEventListener("click", function() {
            let editSection = document.getElementById("editProductSection");
            if (editSection.style.display === "none" || editSection.style.display === "") {
                editSection.style.display = "block";
            } else {
                editSection.style.display = "none";
            }
        });

        // Redirect with Product ID
        document.getElementById("searchButton").addEventListener("click", function(event) {
            event.preventDefault();
            let productId = document.getElementById("searchProduct").value;
            if (productId) {
                window.location.href = "{{ url('/adminProductView') }}?id=" + productId;
            } else {
                alert("Please enter a Product ID.");
            }
        });
        </script>
</body>
</html>
