
<?php
	require_once 'app/User.php';

	$user = new User();

	if( !$user->check_auth() )
		header("Location: http://".$_SERVER['SERVER_NAME'].'/signin.php');

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
		<h1>Home</h1>
	</div>
</div>
<!-- Bootstrap core JS-->
<?php require_once __DIR__.'/assets/js.php'?>
</body>
</html>
