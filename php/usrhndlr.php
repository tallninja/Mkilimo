<?php 

$first = $_POST['fname'];
$last = $_POST['lname'];
$uname = $_POST['uname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$selector = $_POST['selector'];
$submit = $_POST['submit'];


if (!isset($submit)) {
	# code...
	echo 'invalid entry';
	header("location: ../xcx/cerds/dash.php?reg=invalidreq");

}

else {

	if (empty($first) || empty($last) || empty($uname) || empty($phone)) {
		# code...
		echo 'please fill out the required fields';
		header("location: dashadd.php?reg=empty");
	}


	else {

		if (!preg_match("/^[a-zA-Z]*$/", $uname) || !preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			# code...
			header("location: dashadd.php?reg=invalid");
			exit();
		}

		else {

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				# code...
				header("location: dashadd.php?reg=invalidemail");
				echo '<p>invalid email</p>';
				exit();

			}

			else {

				include_once 'conn.php';

				if ($selector == 'afya') {
					# code...
					$sql = "INSERT INTO afya (email, phone, firstname, lastname, date, username) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP(),?);";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param("sssss", $email, $phone, $first, $last, $uname);
					$stmt->execute();
					header("location: dashadd.php?reg=success");

				}
				if ($selector == 'kilimo') {
					# code...
					$sql = "INSERT INTO kilimo (firstname, lastname, username, email, phone, date) VALUES (?, ?, ?, ?, ?,CURRENT_TIMESTAMP());";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param("sssss", $first, $last, $uname, $email, $phone);
					$stmt->execute();
					header("location: dashadd.php?reg=success");

				}
			}	
		}
	}
}	

$stmt->close();
$conn->close();