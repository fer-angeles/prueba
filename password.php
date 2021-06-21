<?php

require_once 'app/User.php';
require_once 'app/Session.php';

$check_user = new User();
$session 	= new Session();

if($session->check('flash_message'))
	$session->destroy('flash_message');

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if( isset($_POST["password"]) )
	{
		$udpate_email = $check_user->update_password([
			'password' 	=> $_POST['password'],
			'email' 	=> $session->get('email')
		]);

		if ( $udpate_email )
			header("Location: http://".$_SERVER['SERVER_NAME'].'/password.php');
		else
			$session->put('Error save email');
	}
	else
		$session->put('Error in email');
}
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
		<h1>Change Password</h1>
	</div>
	<div class="panel">
		<div class="panel-heading"></div>
		<div class="panel-body">
			<form action="password.php" method="post">
				<div class="form-group">
					<label for="password">Change Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
				<button type="submit" class="btn btn-success">
					Update
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
