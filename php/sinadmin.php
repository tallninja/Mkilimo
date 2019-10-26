<?php

include_once 'conn.php';

session_start();


$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$submit = $_POST['submit'];

if (!isset($submit)) {
	# code...
	header("location: ../xcx/creds/sin.php?signin=invalid");
	echo 'error';
	exit();
}

else {

	if (empty($uname) || empty($pass)) {
	# code...
	header("location: ../xcx/creds/sin.php?signin=empty");
	echo '<p>Enter username or password</p>';
	exit();

	}

	else {

		$sql = "SELECT * FROM admin WHERE name='$uname';";
		$result = mysqli_query($conn, $sql);
		$resultchk = mysqli_num_rows($result);

		if ($resultchk < 1) {
			# code...
			header("location: ../xcx/creds/sin.php?signin=nousrerror");
			echo '<p>Username does not exist</p>';
			exit();
		}

		else {

			if ($row = mysqli_fetch_assoc($result)) {
				# code...
				$pwdchk = password_verify($pass, $row['pass']);

				if ($pwdchk == false) {
					# code...
					header("location: ../xcx/creds/sin.php?signin=pswderror");
					echo '<p>invalid username or password</p>';
					exit();
				}

				elseif ($pwdchk == true) {
					# code...
					$_SESSION['uname'] = $row['name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['phone'] = $row['phone'];
					header("location: ../xcx/creds/dash.php?signin=success");
					exit();
				}

			}

		}
	}

}


