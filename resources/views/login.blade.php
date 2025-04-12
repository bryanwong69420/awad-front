!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
	<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");
		body {
			background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
		}

		.login-form {
			background: white;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.form-group label {
			font-weight: bold;
		}

		.form-control {
			border-radius: 5px;
		}

		.btn-primary {
			background-color: #007bff;
			border-color: #007bff;
		}

		.btn-secondary {
			background-color: #6c757d;
			border-color: #6c757d;
		}

		a {
			color: #007bff;
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
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
    

	</style>
</head>
<body>
    @include('navigation')
    <div class="container mt-5 py-5">
        <div class="login-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="list-style-position: inside; text-align: left; padding-left: 0; margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{  route('submitUserLogin')  }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
            <div class="mt-3">
                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>
        </div>
    </div>
   @include('footer')
</body>
</html>
