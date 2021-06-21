<?php
	require_once './app/User.php';
	$user = new User();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="#">Start Bootstrap</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				<?php if($user->check_auth()) :?>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
				<?php endif; ?>
				<li class="nav-item">
					<a class="nav-link" href="#">Register</a>
				</li>
				<?php if($user->check_auth()) :?>
					<li class="nav-item">
						<a class="nav-link" href="password.php">Change Password</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
