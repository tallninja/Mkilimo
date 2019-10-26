<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MKILIMO | CREATEACCOUNT</title>
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
	<form action="../../php/admin.php" method="POST" class="creac">
		<h1>CREATE ACCOUNT</h1>
		
		<input type="text" name="uname" placeholder="Username" id="input1">
		<br>
		<input type="email" name="email" placeholder="email" id="input2">
		<br>
		<input type="text" name="phone" placeholder="phone number" id="input3">
		<br>
		<input type="password" name="pass" placeholder="password" id="input4">
		<br>

		<div class="errors">
		<?php
		if (isset($_GET['signup'])) {
				# code...
			if ($_GET['signup'] == 'error') {
				# code...
				echo '<p>Invalid request!</p>';
				
			}
			if ($_GET['signup'] == 'invalidemail') {
					# code...
				echo '<p>Invalid email!</p>';
			
			}

			if ($_GET['signup'] == 'empty') {
						# code...
				echo '<p>Please fill out all the fields before proceeding!</p>';
							
			}
			if ($_GET['signup'] == 'Invalid') {
							# code...
				echo '<p>Invalid username!</p>';
					
			}
			if ($_GET['signup'] == 'unametaken') {
				# code...
				echo '<p>The username is already taken!</p>';
					
								
			}
			if ($_GET['signup'] == 'emailexists') {
				# code...
				echo '<p>The email already belongs to an account!</p>';
				
			}
			if ($_GET['signup'] == 'unauth') {
				# code...
				echo '<p>You are not authorised to create an account!!!</p>';
			}	
			if ($_GET['signup'] == 'success') {
				# code...
				echo '<p id="success">Account created successfully</p>';
			}	
		}
			
		?>
		</div>

		<p>Already have an account? <a href="sin.php">Sign in</a></p>
		<button type="submit" name="submit" class="button">CREATE</button>

	</form>
	</div>
	</div>
	</section>

	<footer>
			<div class="container">
			<p>M-KILIMO Copyright &copy; 2019</p>
			</div>
		</footer>





</body>
</html>