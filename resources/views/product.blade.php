<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-***" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

        button:hover{
            background-color: #3a3833;
            top: 0;
            left: 0;
        }

        .star {
            padding: 10px 0;
        }

        hr{
            width: 30px;
            height: 2px;
            background-color: coral;
        }

        .star i{
            font-size: 0.8rem;
            color: goldenrod;
        }

        footer{
            background-color: #222;
        }

        footer h5{
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }

        footer li{
            padding-bottom: 4px;
        }

        footer li a{
            font-size: 0.8rem;
            color: #999;
        }

        footer li a:hover{
            color: #d8d8d8;
        }

        footer p{
            color: #999;
            font-size: 0.8rem;
        }

        footer .copyright a{
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

        footer .copyright a:hover{
            background-color: #fb774b;
        }


        .navbar{
            font-size: 16px;
            background-color: white;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-light .navbar-nav .nav-link{
            padding: 0 20px;
            color: black;
            transition: 0.3s ease;
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar i:hover,
        .navbar-light .navbar-nav .nav-link .active,
        .navbar i.active{
            color: coral;
        }

        .navbar i{
            font-size: 1.2rem;
            padding: 0 7px;
            cursor: pointer;
            transition: 0.3sec ease;
        }

        #bar{
            font-size: 1.5rem;
            padding: 7px;
            cursor: pointer;
            transition: 0.3s ease;
            color: black;
        }

        #bar:hover,
        #bar.active{
            color: white;
        }

        /*Mobile Nav*/

        .navbar-light .navbar-toggler{
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

.product .buy-btn  {
            background-color: coral;
            transform: translateY(20px);
            opacity: 0;
            transition: 0.3s all; 
        }

        .product:hover .buy-btn{
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

  </script>
</head>
<body>
    @include('navigation')
<div class="container mt-3">
       <div class="product-nav-wrapper">
       <nav class="product-nav">
        <ul>
            <li><a href="?brand=Samsung">Samsung</a></li>
            <li><a href="?brand=LG">LG</a></li>
            <li><a href="?brand=Sony">Sony</a></li>
            <li><a href="?brand=Panasonic">Panasonic</a></li>
            <li><a href="?category=TV">TV</a></li>
            <li><a href="?category=Fridge">Fridge</a></li>
            <li><a href="?category=Washing Machine">Washing Machine</a></li>
            <li><a href="?category=Washing Machine">Washing Machine</a></li>
            <li><a href="?category=Washing Machine">Washing Machine</a></li>
            <li><a href="?category=Washing Machine">Washing Machine</a></li>
        </ul>
      </nav>
    </div>
</div>

<section id="featured">
    <div class="container text-center mt-5 py-5">
        <h3>Our Featured</h3>
        <hr class="mx-auto">
        <p>Here you can check out our featured product</p>
    </div>
    <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/featured/wash.webp" alt="">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">LG 10KG Heat Pump Tumble Dryer Inverter</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/featured/vac.webp" alt="">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">Khind Vacuum Cleaner VC68P</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/featured/tv.webp" alt="">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">Samsung 65 inch The Frame QLED 4K Smart Lifestyle TV (2022)</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/featured/pot.webp" alt="">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">Faber 1.5L Slow Cooker FBR-FSC150BK</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
    </div>
</section>

<section id="Kitchen Appliances" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Kitchen Appliances</h3>
        <hr class="mx-auto">
        <p>Here you can check out some of the kitchen appliances</p>
    </div>
    <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/kitchen/panasonic.webp" alt="" style="width: 100%; aspect-ratio: 1 / 1; object-fit: contain;">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">Panasonic Ultra Filtration Alkaline Ionizer</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/kitchen/elba.webp" alt="" style="width: 100%; aspect-ratio: 1 / 1; object-fit: contain;">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">Elba 1.7L Jug Kettle</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/kitchen/refri.webp" alt="" style="width: 100%; aspect-ratio: 1 / 1; object-fit: contain;">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">Elba 2 Door Fridge 250L</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/kitchen/khino.webp" alt="" style="width: 100%; aspect-ratio: 1 / 1; object-fit: contain;">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">Khind Multi Blender Chopper</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
    </div>

<section id="Mobile" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Best Mobile</h3>
        <hr class="mx-auto">
        <p>Here you can check out our new released mobile phone</p>
    </div>
    <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/mobile/i15pm.webp" alt="">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">iPhone 15 Pro Max</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/mobile/i15p.webp" alt="">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">iPhone 15 Plus</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/mobile/galaxys24u.jpg" alt="">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">Samsung Galaxy S24 Ultra 5G</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="/pic/mobile/galaxys24.jpg" alt="">
            <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name">Samsung Galaxy S24+ 5G</h5>
            <h4 class="p-name">$100.00</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
    </div>
</section>
 @include('footer')
</body>
</html>