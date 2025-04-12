<!DOCTYPE html>

<html>
	<head>
		<title>Create New Account</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Register</title>
    
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-***" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/26910e88d1.js" crossorigin="anonymous"></script>
		<style>
         @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");
			body {
				background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
			}

			.registration-form {
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
				border: 1px solid #ced4da;
			}

			.form-control:focus {
				border-color: #80bdff;
				outline: 0;
				box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
			}

			.btn-primary {
				background-color: #007bff;
				border-color: #007bff;
			}

			.btn-secondary {
				background-color: #6c757d;
				border-color: #6c757d;
			}

			.btn-primary:hover,
			.btn-secondary:hover {
				opacity: 0.85;
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
        <div class="registration-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="list-style-position: inside; text-align: left; padding-left: 0; margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('submitUserRegistration') }}" method="post">                
                @csrf
                <div class="form-group">
                    <label for="userName">Username:</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Username" >
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Email" >
                </div>
                <div class="form-group">
                    <label for="telNo">Telephone Number:</label>
                    <input type="tel" class="form-control" id="telNo" name="telNo" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" >
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" >
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
   @include('footer')
</body>
</html>
