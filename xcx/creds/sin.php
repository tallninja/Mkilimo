<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MKILIMO | SIGNIN</title>
	<link rel="stylesheet" type="text/css" href="../../styles/style.css">

</head>
<body>
		<header>
			<div class="container">
				<h1><span class="highlight">M-</span>KILIMO</h1>
			</div>
		</header>

		<section id="signin">
		<div class="container">
			<div class="dark">
				<form method="POST" action="../../php/sinadmin.php" class="signin">

					<h2>SIGN IN</h2>
					<input type="text" name="uname" placeholder="Username" id="input1">
					<br>
					<input type="password" name="pass" placeholder="Password" id="input2">
					<br>

					<div class="errors">
					<?php
					if (isset($_GET['signin'])) {
						# code...
						if ($_GET['signin'] == 'nousrerror') {
							# code...
							echo '<p>Invalid username or password!</p>';
						}
						if ($_GET['signin'] == 'pswderror') {
							# code...
							echo '<p>Invalid username or password!</p>';
						}
						if ($_GET['signin'] == 'empty') {
							# code...
							echo '<p>Enter username and password!</p>';
						}
						if ($_GET['signin'] == 'Invalid') {
							# code...
							echo '<p>Invalid request!</p>';
						}
					}	
					?>
					</div>

					<ul>
								
						<li id="cra"><a href="cra.php">Create account?</a></li>
						<li id="frgt"><a href="frgt.php">Forgot password?</a></li>
					

					</ul>

					<button type="submit" name="submit" class="button">SIGN IN</button>
				</form>
			</div>
		</div>
		</section>

		<div class="footer">
		<footer>
			<div class="container">
			<p>M-KILIMO Copyright &copy; 2019</p>
			</div>
		</footer>
		</div>
		
			
</body>
</html>
				





