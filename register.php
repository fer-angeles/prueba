<?php

	require_once 'app/User.php';
	require_once 'app/Session.php';

	$session = new Session();

	if($session->check('flash_message'))
		$session->destroy('flash_message');

	if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if( isset($_POST["email"]) && isset($_POST["password"]))
		{
			$new_user = new User();
			$new_user = $new_user->register([
				'email' 		=> $_POST['email'],
				'password' 	=> $_POST['password']
			]);

			if ( $new_user )
				header("Location: http://".$_SERVER['SERVER_NAME'].'/signin.php');
			else
				$session->put('Error email or password');
		}
		else
			$session->put('Error email or password incorrect');
	}

	var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Test</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<?php require_once __DIR__.'/assets/css.php'?>
</head>
<body>
<!-- Responsive navbar-->
<?php require_once __DIR__.'/widgets/nav.php'?>
<!-- Page content-->
<div class="container">
	<div class="text-center mt-5">
		<h1>Regiter</h1>
	</div>
	<div class="panel">
		<div class="panel-heading"></div>
		<div class="panel-body">
			<form action="register.php" method="post">
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
				<button type="submit" class="btn btn-success">
					Save
				</button>
			</form>
			<br>
			<?php
				if( $session->check('flash_message') )
				{
					echo '<div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							'.$session->get('flash_message').' 
						</div>';
				}
			?>
		</div>
	</div>
</div>
<!-- Bootstrap core JS-->
<?php require_once __DIR__.'/assets/js.php'?>
</body>
</html>
