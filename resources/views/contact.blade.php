<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha384-***" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
        integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <style>
        .contact-form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .contact-form h2 {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control,
        .btn-primary {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }


        #address,
        .contact-info {
            background: none;
            box-shadow: none;
            padding-left: 0;
        }

        #address p,
        .contact-info p {
            margin-left: 20px;
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

        body {
            font-family: 'Poppins', sans-serif;
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

        @media only screen and (max-width:991px) {

            body>nav>div>button:hover,
            body>nav>div>button:focus {
                background-color: coral;
            }
        }
    </style>
</head>

<body>
    @include('navigation')

    <div class="container my-5 py-5">
        <h1 class="mb-4">Contact Us</h1>

        <div id="address" class="mb-4">
            <h4>Address:</h4>
            <p>2, Jalan Ekoperniagaan 1/29, Taman Ekoperniagaan, 81100 Johor Bahru, Johor, Malaysia</p>
        </div>

        <div class="contact-info mb-4">
            <h4>Contact Number:</h4>
            <p>+60 12-345 6789</p>
        </div>

        <div class="contact-info mb-4">
            <h4>Email:</h4>
            <p>TankQ@gmail.com</p>
        </div>

        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form method="POST" action="{{ route('contact.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" id="name" name="customer_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>

    @include('footer')
</body>

</html>