<?php

include_once 'conn.php';


if (!isset($_POST['submit'])) {
	
	header("location: ../xcx/creds/cra.php?signup=error");
	exit();
}

else {

	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);

	if (empty($uname) || empty($email) || empty($phone) || empty($pass)) {
	# code...
		header("location: ../xcx/creds/cra.php?signup=empty");
		exit();
	}

	else {

		if (!preg_match("/^[a-zA-Z]*$/", $uname)) {
			# code...
			header("location: ../xcx/creds/cra.php?signup=invalid");
			exit();
		}

		else {

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				# code...
				header("location: ../xcx/creds/cra.php?signup=invalidemail");
				exit();

			}


			else {

				$sql = "SELECT * FROM admin WHERE name='$uname';";
				$result = mysqli_query($conn, $sql);
				$resultchk = mysqli_num_rows($result);

				if ($resultchk > 0) {
					# code...
					header("location: ../xcx/creds/cra.php?signup=unametaken");
					exit();
				}

				else {

					$sql = "SELECT * FROM admin WHERE email='$email';";
					$result = mysqli_query($conn, $sql);
					$resultchk = mysqli_num_rows($result);

					if ($resultchk > 0) {
						# code...
						header("location: ../xcx/creds/cra.php?signup=emailexists");
						exit();
					}

					else {

						$pwd = password_hash($pass, PASSWORD_DEFAULT);

						$sql = "INSERT INTO admin (name, email, phone, pass) VALUES ('$uname', '$email', '$phone', '$pwd');";
						mysqli_query($conn, $sql);
						header("location: ../xcx/creds/cra.php?signup=success");

					}

				}
			}
			
		}

	}
}
	


$conn->close();
