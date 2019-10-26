
<?php

session_start();

if (!isset($_SESSION['uname'])) {
	# code...
	header("location: ../xcx/creds/sin.php?signin=error");
	exit();
}
?>


	<!DOCTYPE html>
	<html>
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>MKILIMO | DASHBOARD</title>
		<link rel="stylesheet" type="text/css" href="../../styles/style.css">

	</head>
	<body>

		<header>
			<div class="container">
				<h1>DASHBOARD</h1>
				<form action="logout.php" method="POST">
					<button type="submit" name="logout" class="logout">LOGOUT</button>
				</form>
			</div>
		</header>
		

		<aside id="message">
			<div class="container">
			<form method="POST" action="../../php/msghndlr.php" class="broadmess">
				<h3>MESSAGE</h3>

				<?php
					if (isset($_GET['message'])) {
						# code...
						if ($_GET['message'] == 'connerror') {
							# code...
							echo '<p class="errors">Cannot connect to the database</p>';
						}
						if ($_GET['message'] == 'empty') {
							# code...
							echo '<p class="errors">Enter the message</p>';
						}
						if ($_GET['message'] == 'error') {
							# code...
							echo '<p class="errors">Invalid request</p>';
						}
						if ($_GET['message'] == 'backup') {
							# code...
							echo '<p class="errors">Message backed up successfully</p>';
						}
					}		
					if (isset($_GET['send'])) {
						
						if ($_GET['send'] == 'kilimosuccess') {
							# code...
							echo '<p class="success">Message sent successfully to kilimo clients</p>';
						}
						if ($_GET['send'] == 'afyasuccess') {
							# code...
							echo '<p class="success">Message sent successfully to afya clients</p>';
						}
						if ($_GET['send'] == 'bothsuccess') {
							# code...
							echo '<p class="success">Message sent successfully to both clients</p>';
						}
						if ($_GET['send'] == 'invalidnum') {
							# code...
							echo '<p class="errors">Invalid number Detected</p>';
						}
						if ($_GET['send'] == 'invalidchars') {
							# code...
							echo '<p class="errors">Please enter a valid message</p>';
						}
						if ($_GET['send'] == 'empty') {
							# code...
							echo '<p class="errors">Please enter a message</p>';
						}
					}
				?>	

				<textarea rows="20" cols="10" placeholder="Enter your message here" name="broadmess"></textarea>
				<br>
				<label class="container">Afya
					<input type="radio" name="group" value="afya"> 
					<span class="checkmark"></span>
				</label>
				<label class="container">Kilimo
					<input type="radio" name="group" value="kilimo" checked> 
					<span class="checkmark"></span>
				</label>
				<label class="container">Both
					<input type="radio" name="group" value="both"> 
					<span class="checkmark"></span>
				</label>

				<button type="submit" name="backup" class="button">BACKUP</button>
				<button type="submit"formaction="../../php/sms.php" name="send" class="button">SEND</button>
				</form>

				<div id="remove">
				<form method="POST" action="../../php/rmusr.php">
					
					<h3>REMOVE CLIENT</h3>
					<p>Enter the username of the client youd wish to remove and select the group they belong to</p>
					<br>
					<input type="text" name="uname" placeholder="Client Username">
					<input type="radio" name="group" value="afya"> Afya
					<input type="radio" name="group" value="kilimo" checked> Kilimo
					<br>
					<?php
								if (isset($_GET['remove'])) {
									# code...
									if ($_GET['remove'] == 'nousr') {
										# code...
										echo '<p>Client does not exist</p>';
									}
									if ($_GET['remove'] == 'empty') {
										# code...
										echo '<p>Enter a Client</p>';
									}
									if ($_GET['remove'] == 'error') {
										# code...
										echo '<p>Invalid request</p>';
									}
									if ($_GET['remove'] == 'success') {
										# code...
										echo '<p>Client removed successfully</p>';
									}
								}
							?>		
						<button type="submit" name="remove" class="button">REMOVE</button>
					</form>
					</div>

				</div>
		</aside>


		
		<aside id="sidebar">
			<div class="dark">
			<div id="users">
			<div class="container">

				<div class="user">
					<form method="POST" action="../../php/dashadd.php">
						<button type="submit" name="submit" class="button">ADD CLIENT</button>
					</form>
				</div>

				<div class="user">
					<form method="POST" action="../../php/shwusr.php" class="clients">
						<h3>VIEW CLIENTS</h3>
						<button type="submit" name="afya" class="button">AFYA</button>
						<button type="submit" name="kilimo"  class="button">KILIMO</button>
					</form>
				</div>

				<div class="user">
					<form method="POST" action="../../php/vwmsg.php">

						<h3>VIEW MESSAGES</h3>
						<button type="submit" name="afya" class="button">AFYA</button>
						<button type="submit" name="kilimo" class="button">KILIMO</button>

					</form>
				</div>
				</div>
			</div>
			</div>
			</aside>

			<section>
				<div class="container">
					
					</div>
				</section>
				
			</div>

		<footer>
			<div class="container">
			<p>M-KILIMO Copyright &copy; 2019</p>
			</div>
		</footer>
			
	</body>
	</html>

	