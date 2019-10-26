<?php

include_once 'conn.php';

$text = $_POST['broadmess'];
$group = $_POST['group'];
$backup = $_POST['backup'];


if (!isset($backup)) {
	echo "error";
	header("location: ../xcx/creds/dash.php?message=error");
}

else {

	if (empty($text)) {
		# code...
		header("location: ../xcx/creds/dash.php?message=empty");
	}

	else {

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		    header("location: ../xcx/creds/dash.php?message=connerror");
		}
		else {

			if (isset($group) && $group == 'afya'){

				$sql = "INSERT INTO afyamessages (message, date) VALUES (?, CURRENT_TIMESTAMP())";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("s", $text);
				$stmt->execute();
				header("location: ../xcx/creds/dash.php?message=backup");
			}
			if (isset($group) && $group == 'kilimo') {

				$sql = "INSERT INTO kilimomessages (message, date) VALUES (?, CURRENT_TIMESTAMP())";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("s", $text);
				$stmt->execute();
				header("location: ../xcx/creds/dash.php?message=backup");

			}

			if (isset($group) && $group == 'both') {

				$sql = "INSERT INTO kilimomessages (message, date) VALUES (?, CURRENT_TIMESTAMP())"; 
				$sql1 = "INSERT INTO afyamessages (message, date) VALUES (?, CURRENT_TIMESTAMP());";
				$stmt = $conn->prepare($sql);
				$stmt1 = $conn->prepare($sql1);
				$stmt->bind_param("s", $text);
				$stmt1->bind_param("s", $text);
				$stmt->execute();
				$stmt1->execute();
				header("location: ../xcx/creds/dash.php?message=backup");
				
			}
	
		}
	}
}


$stmt->close();
$conn->close();
