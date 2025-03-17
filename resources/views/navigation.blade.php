<style>
    .navbar {
        font-size: 16px;
        background-color: white;
        padding: 10px 20px;
    }

    .navbar-light .navbar-nav .nav-link {
        padding: 0 15px;
        color: black;
        transition: 0.3s ease;
        text-decoration: none;
    }

    .nav-link {
        color: black;
    }

    .navbar-light .navbar-nav .nav-link:hover,
    .navbar i:hover,
    .navbar-light .navbar-nav .nav-link.active,
    .navbar i.active {
        color: coral;
    }

    .navbar-toggler {
        border: none;
        outline: none;
    }

    .navbar-collapse {
        justify-content: flex-end;
    }

    .navbar-nav {
        gap: 20px;
        align-items: center;
    }

    .nav-link {
        color: black;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .nav-link i {
        font-size: 20px;
        transition: color 0.3s ease;
    }

    .nav-link:hover,
    .btn-outline-secondary:hover {
        color: coral;
    }

    .btn-outline-secondary {
        border: 1px solid gray;
        color: black;
        transition: all 0.3s ease-in-out;
    }

    .btn-outline-secondary:hover {
        color: gray;
    }

    .btn-outline-secondary i {
        color: gray;
        transition: none;
    }

    .btn-outline-secondary:hover i {
        color: black;
    }

    @media (max-width: 991px) {
        .search-bar {
            order: 3;
            margin-top: 10px;
        }

        .navbar-nav {
            gap: 10px;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .navbar-collapse {
            justify-content: center;
        }

        .navbar-toggler {
            border: none;
            outline: none;
        }
    }


</style>

<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">TankQ</a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav"> 
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


