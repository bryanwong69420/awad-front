<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha384-***" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
        integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- jQuery and Bootstrap 4 JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            width: 100%;
            padding-top: 120px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        h2 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        h3 {
            font-size: 1.4rem;
            font-weight: 800;
        }

        h4 {
            font-size: 1.1rem;
            font-weight: 600;
        }

        h5 {
            font-size: 1rem;
            font-weight: 400;
            color: #1d1d1d;
        }

        h6 {
            color: #d8d8d8;
        }

        button {
            font-size: 0.8rem;
            font-weight: 700;
            outline: none;
            border: none;
            background-color: #1d1d1d;
            color: aliceblue;
            padding: 13px 30px;
            cursor: pointer;
            text-transform: uppercase;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #3a3833;
            top: 0;
            left: 0;
        }

        .star {
            padding: 10px 0;
        }

        hr {
            width: 30px;
            height: 2px;
            background-color: coral;
        }

        .star i {
            font-size: 0.8rem;
            color: goldenrod;
        }

        footer {
            background-color: #222;
        }

        footer h5 {
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }

        footer li {
            padding-bottom: 4px;
        }

        footer li a {
            font-size: 0.8rem;
            color: #999;
        }

        footer li a:hover {
            color: #d8d8d8;
        }

        footer p {
            color: #999;
            font-size: 0.8rem;
        }

        footer .copyright a {
            color: #000;
            height: 38px;
            width: 38px;
            background-color: #fff;
            display: inline-block;
            text-align: center;
            line-height: 38px;
            border-radius: 50%;
            transition: 0.3s ease;
            margin: 0 5px;
        }

        footer .copyright a:hover {
            background-color: #fb774b;
        }


        .navbar {
            font-size: 16px;
            background-color: white;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-light .navbar-nav .nav-link {
            padding: 0 20px;
            color: black;
            transition: 0.3s ease;
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar i:hover,
        .navbar-light .navbar-nav .nav-link .active,
        .navbar i.active {
            color: coral;
        }

        .navbar i {
            font-size: 1.2rem;
            padding: 0 7px;
            cursor: pointer;
            transition: 0.3sec ease;
        }

        #bar {
            font-size: 1.5rem;
            padding: 7px;
            cursor: pointer;
            transition: 0.3s ease;
            color: black;
        }

        #bar:hover,
        #bar.active {
            color: white;
        }

        /*Mobile Nav*/

        .navbar-light .navbar-toggler {
            border: none;
            outline: none;
        }

        .product-nav-wrapper {
            display: flex;
            margin-top: -50px;
            align-items: center;
            position: relative;
            max-width: 100%;
            overflow: hidden;
            z-index: 10;
        }

        .product .buy-btn {
            background-color: coral;
            transform: translateY(20px);
            opacity: 0;
            transition: 0.3s all;
        }

        .product:hover .buy-btn {
            transform: translateY(20px);
            opacity: 1;
            transform: scale(1.1);
            border-radius: 10px;
        }

        .product-nav {
            overflow-x: auto;
            scroll-behavior: smooth;
            white-space: nowrap;
            flex-grow: 1;
        }

        .product-nav ul {
            display: flex;
            padding: 0;
            margin: 0;
            list-style: none;
            width: max-content;
        }

        .product-nav li {
            flex: 0 0 auto;
            text-align: center;
            padding: 0 10px;
        }

        .product-nav a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-radius 0.2s ease-in-out;
        }


        .product-nav a:hover {
            background-color: coral;
            color: white;
            border-radius: 10px;
        }


        .scroll-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(200, 200, 200, 0.8);
            border: none;
            cursor: pointer;
            padding: 10px;
            font-size: 18px;
            z-index: 10;
            transition: 0.3s;
        }

        .scroll-btn:hover {
            background-color: #bbb;
        }

        .scroll-btn.left {
            left: 0;
        }

        .scroll-btn.right {
            right: 0;
        }


        #sortBtn {
            min-width: 100px;
        }

        /* 
.dropdown-menu {
    min-width: 150px;
    text-align: left;
}

.dropdown-item {
    cursor: pointer;
}
    */
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const nav = document.querySelector(".product-nav");
            const leftBtn = document.querySelector(".scroll-btn.left");
            const rightBtn = document.querySelector(".scroll-btn.right");


            function checkButtons() {
                leftBtn.style.display = nav.scrollLeft > 0 ? "block" : "none";
                rightBtn.style.display = nav.scrollLeft + nav.clientWidth < nav.scrollWidth ? "block" : "none";
            }


            const scrollAmount = 200;

            leftBtn.addEventListener("click", function () {
                nav.scrollBy({ left: -scrollAmount, behavior: "smooth" });
            });

            rightBtn.addEventListener("click", function () {
                nav.scrollBy({ left: scrollAmount, behavior: "smooth" });
            });


            nav.addEventListener("scroll", checkButtons);


            checkButtons();
        });

        /* maybe can use for the sortBtn
        
        document.addEventListener("DOMContentLoaded", function () {
            let priceSortOrder = "desc"; 
            let dateSortOrder = "desc";
        
            document.getElementById("sortPrice").addEventListener("click", function () {
                sortProducts("price", priceSortOrder);
                priceSortOrder = priceSortOrder === "desc" ? "asc" : "desc"; 
            });
        
            document.getElementById("sortDate").addEventListener("click", function () {
                sortProducts("date", dateSortOrder);
                dateSortOrder = dateSortOrder === "desc" ? "asc" : "desc"; 
            });
        
            function sortProducts(type, order) {
                console.log(`Sorting by ${type} in ${order} order`);
              
            }
            
        });
        */
    </script>
</head>

<body>
    @include('navigation')
    @php
        $brands = \App\Models\CompanyAssociation::orderBy('company_association')->get();
    @endphp
    <div class="container mt-3">
        <div class="product-nav-wrapper">
            <nav class="product-nav">
                <ul>
                    @foreach ($brands as $brandItem)
                        <li>
                            <a
                                href="{{ route('products.byCompany', ['company' => strtolower($brandItem->company_association)]) }}">
                                {{ ucfirst(strtolower($brandItem->company_association)) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>

    <section id="brand-products" class="my-5">

        <div class="container text-center mt-5 py-5">
            <h3>{{ $brand }} Products</h3>
            <hr class="mx-auto">
            <p>Here you can check out our products by {{ $brand }}</p>
        </div>
        <div class="dropdown mb-3 text-right">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown"
                data-toggle="dropdown">
                Sort by Price
            </button>
            <div class="dropdown-menu" aria-labelledby="sortDropdown">
                <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">Low
                    to High</a>
                <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">High
                    to Low</a>
            </div>
        </div>
        <div class="row mx-auto container-fluid">
            @forelse($products as $product)
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="{{ $product->image_url }}" alt="{{ $product->name }}"
                        style="width: 100%; aspect-ratio: 1 / 1; object-fit: contain;">

                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">{{ $product->name }}</h5>
                    <h4 class="p-name">${{ number_format($product->price, 2) }}</h4>
                    <button class="buy-btn">Buy Now</button>
                </div>
            @empty
                <div class="col-12">
                    <p>No products found for {{ $brand }}.</p>
                </div>
            @endforelse
        </div>
    </section>
    @include('footer')
</body>

</html>