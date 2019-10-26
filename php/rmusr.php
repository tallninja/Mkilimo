<?php
include_once 'conn.php';

$group = $_POST['group'];
$remove = $_POST['remove'];
$uname = mysqli_real_escape_string($conn, $_POST['uname']);

if (!isset($remove)) {
	# code...
	echo 'invalid request';
	header("location: ../xcx/creds/dash.php?remove=error");
	exit();
}

else {

	if (empty($uname)) {
		# code...
		echo 'invalid request';
		header("location: ../xcx/creds/dash.php?remove=empty");
		exit();
	}

	else {


		if (isset($group) && $group == 'afya') {
			# code...
			$sql = "SELECT * FROM afya WHERE username='$uname'";
			$result = mysqli_query($conn, $sql);
			$rsltchk = mysqli_num_rows($result);

			if ($rsltchk < 1) {
				# code...
				header("location: ../xcx/creds/dash.php?remove=nousr");
				exit();
			}

			else {

				$sql = "DELETE FROM afya WHERE username='$uname';";
				$result = mysqli_query($conn, $sql);
				echo $uname.' Removed Successfully';
				header("location: ../xcx/creds/dash.php?remove=success");
			}

		}
			
		if (isset($group) && $group == 'kilimo') {
			# code...
			$sql = "SELECT * FROM kilimo WHERE username='$uname'";
			$result = mysqli_query($conn, $sql);
			$rsltchk = mysqli_num_rows($result);

			if ($rsltchk < 1) {
				# code...
				header("location: ../xcx/creds/dash.php?remove=nousr");
				exit();
			}

			else {

			$sql = "DELETE FROM kilimo WHERE username=?;";
			$result = mysqli_query($conn, $sql);
			header("location: ../xcx/creds/dash.php?remove=success");

			}

		}	
	}	
}		

$stmt->close();
$conn->close();
