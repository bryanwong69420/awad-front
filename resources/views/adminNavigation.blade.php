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
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3 fixed-top">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand font-weight-bold" href="/admin">TankQ</a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/admin">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('adminFeedback') }}">Feedbacks</a></li>
                <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="padding: 0;">Logout</button>
                        </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
