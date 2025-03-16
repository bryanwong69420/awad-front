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

    .search-bar {
        flex: 200;
        display: flex;
        justify-content: center;
    }

    .search-bar form {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .search-bar input {
      flex-grow: 1;
      width: 300px;
      max-width: 500px; 
      border-radius: 20px 0 0 20px;
      border: 1px solid #ccc;
      padding: 8px 12px;
      outline: none;
      height:40px;
      font-size: 16px;
    }

    .search-bar button {
        border: 1px solid #ccc;
        border-left: none;
        background-color: #f8f9fa;
        padding: 8px 15px;
        cursor: pointer;
        border-radius: 0 20px 20px 0;
        transition: background-color 0.3s ease-in-out;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-bar button:hover {
        background-color: coral;
        color: white;
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


    .dropdown-menu.show {
        display: block;
    }

    .dropdown-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
        color: black;
        text-decoration: none;
        transition: background-color 0.3s ease;
        cursor: pointer;
    }

    .dropdown-item:hover {
        background-color: lightgray;
    }

    .dropdown-item i {
        margin-left: auto;
        color: gray;
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

    /* Dropdown Positioning */
    .dropdown {
        position:relative;
        display: inline-block;
    }

    
    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 50%; 
        transform: translateX(-50%); 
        display: none;
        min-width: 150px; 
        background-color: white;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 5px 0;
        z-index: 1000;
    }
</style>

<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">TankQ</a>

        <div class="search-bar">
            <form class="d-flex" id="searchForm">
                <input class="form-control" type="text" placeholder="Search">
                <button class="btn btn-outline-secondary" type="button" id="filterBtn">
                    <i class="fa-solid fa-filter"></i>
                </button>
            </form>

            <div class="dropdown" id="sortContainer">
                <div class="dropdown-menu" id="sortMenu">
                    <a class="dropdown-item" href="#" id="sortDate">
                        Sort by Date <i class="fa-solid fa-sort"></i>
                    </a>
                    <a class="dropdown-item" href="#" id="sortPrice">
                        Sort by Price <i class="fa-solid fa-sort"></i>
                    </a>
                </div>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i id="bar" class="fa-solid fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav"> 
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    let dateOrder = "newest";
    let priceOrder = "highest";

    document.getElementById("filterBtn").addEventListener("click", function () {
        document.getElementById("sortMenu").classList.toggle("show");
    });

    document.getElementById("sortDate").addEventListener("click", function () {
        dateOrder = dateOrder === "newest" ? "oldest" : "newest";
        console.log("Sorting by date:", dateOrder);
    });

    document.getElementById("sortPrice").addEventListener("click", function () {
        priceOrder = priceOrder === "highest" ? "lowest" : "highest";
        console.log("Sorting by price:", priceOrder);
    });

    document.addEventListener("click", function (event) {
        let menu = document.getElementById("sortMenu");
        let button = document.getElementById("filterBtn");

        if (!button.contains(event.target) && !menu.contains(event.target)) {
            menu.classList.remove("show");
        }
    });
</script>
