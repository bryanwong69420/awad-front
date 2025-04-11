<?php
session_start();
include 'db.php'; // Assuming your db.php file is set up correctly

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-***" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="/html/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/26910e88d1.js" crossorigin="anonymous"></script>
    <style>
        #cart-container{
            overflow-x: auto;

        }

        #cart-container table{
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
            white-space: nowrap;
        }

        #cart-container table thead{
            font-weight: 700;
        }

        #cart-container table thead td{
            background: #fd8c66;
            color: #fff;
            border: none;
            padding: 6px 0;
        }

        #cart-container table td{
            border: 1px solid #b6b3b3;
            text-align:center;
        }

        #cart-container table td:nth-child(1){
            width: 100px;
        }

        #cart-container table td:nth-child(2),
        #cart-container table td:nth-child(3){
            width: 200px;
        }

        #cart-container table td:nth-child(4),
        #cart-container table td:nth-child(5),
        #cart-container table td:nth-child(6){
            width: 170px;
        }

        #cart-container table tbody img{
            width: 100px;
            height: 80px;
            object-fit: cover;
        }

        #cart-container table tbody i{
            color: #8d8c89;
        }

        #cart-bottom .coupon>div,
        #cart-bottom .total>div{
            border: 1px solid #b6b3b3;
        }

        #cart-bottom .coupon h5,
        #cart-bottom .total h5{
            background: #fd8c66;
            color: #fff;
            border: none;
            padding: 6px 12px;
            font-weight: 700；
        }

        #cart-bottom .coupon p,
        #cart-bottom .coupon input{
            padding: 0 12px;
        }

        #cart-bottom .coupon input{
            height: 44px;
        }
        
        #cart-bottom .coupon input,
        #cart-bottom .coupon button{
            margin: 0 0 20px 12px;
        }

        #cart-bottom .total div>div{
            padding: 0 12px;
        }

        #cart-bottom .total h6{
            color: #2a2a2a;
        }

        .second-hr{
            background: #b8b7b3;
            width: 100%;
            height:1px;
        }

        #cart-bottom .total div>button{
            margin: 0 12px 20px 0;
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>
<body>

<?php include('includes/navigation.php'); ?> 

<section id="blog-home" class="pt-5 mt-5 container my-5">
    <h2 clas="font-weight-bold pt-5">Shopping Cart</h2>
    <hr>
</section>

<form action="updateCart.php" method="post">
    <section id="cart-container" class="container">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                    <?php foreach ($_SESSION['cart'] as $productId => $productDetails): ?>
                        <tr>
                            <td><a href="removeFromCart.php?id=<?= $productId; ?>"><i class="fas fa-trash-alt"></i></a></td>
                            <td><img src="<?= $productDetails['image_url']; ?>" alt="" style="width: 100px; height: 80px;"></td>
                            <td><?= $productDetails['name']; ?></td>
                            <td>$<?= $productDetails['price']; ?></td>
                            <td><input class="w-25 pl-1" name="quantity[<?= $productId; ?>]" value="<?= $productDetails['quantity']; ?>" type="number" disabled></td>
                            <td>$<?= $productDetails['price'] * $productDetails['quantity']; ?></td>
                        </tr>
                        <?php $total += $productDetails['price'] * $productDetails['quantity']; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </section>


    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <table class="table">
                    <tr>
                        <th>Total:</th>
                        <td>$<?= number_format($total, 2); ?></td>
                    </tr>
                </table>
                <a href="payment.php" class="btn btn-success btn-block">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</form>




<?php include('includes/footer.php'); ?> 


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"></script>

<script>


</script>

</body>
</html>
