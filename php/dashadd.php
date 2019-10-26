<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MKILIMO | ADDCLIENT</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">

</head>
<body>
	<header>
			<div class="container">
				<h1><span class="highlight">M-</span>KILIMO</h1>
			<form action="../xcx/creds/dash.php" method="POST">
					<button type="submit" name="logout" class="logout">BACK</button>
			</form>
			</div>
		</header>


	<section id="signin">
	<div class="container">
	<div class="dark">
	<form method="POST" action="usrhndlr.php" class="dashadd">

				<h2>ADD CLIENT</h2>
				<input type="text" name="fname" placeholder="First Name" id="input1">
				<br>	
				<input type="text" name="lname" placeholder="Last Name" id="input2">
				<br>
				<input type="text" name="uname" placeholder="Username" id="input3">
				<br>
				<input type="email" name="email" placeholder="Email" id="input4">
				<br>
				<input type="text" name="phone" placeholder="Phone Number(+254...)" id="input5">
				<br>
				<div class="custom-select" style="width:200px;">
					<select name="selector">
						<option value="kilimo">Kilimo</option>
						<option value="afya">Afya</option>
					</select>
				</div>

				<br>
				<div class="errors">
				<?php
					if (isset($_GET['reg'])) {
						# code...
						if ($_GET['reg'] == 'invalidemail') {
							# code...
							echo '<p>Invalid email</p>';
						}
						if ($_GET['reg'] == 'invalid') {
							# code...
							echo '<p>Please enter valid details</p>';
						}
						if ($_GET['reg'] == 'empty') {
							# code...
							echo '<p>Please fill out all the required fields</p>';
						}
						if ($_GET['reg'] == 'invalidreq') {
							# code...
							echo '<p>Invalid request</p>';
						}
						if ($_GET['reg'] == 'success') {
							# code...
							echo '<p id="success">User added successfully</p>';
						}
					}
				?>	
				</div>	

				<button type="submit" name="submit" class="button">ADD</button>
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





