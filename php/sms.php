<?php
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;
include_once 'conn.php';

$text = $_POST['broadmess'];
$group = $_POST['group'];
$send = $_POST['send'];

if (!isset($send)) {
	# code...
	header("location: ../xcx/creds/dash.php?send=failure");
	exit();
}

else {

	if (empty($text)) {
		# code...
		header("location: ../xcx/creds/dash.php?send=empty");
		exit();
	}


	else {


		if (!preg_match("/^[a-zA-Z 1-9]*$/", $text)) {
			# code...
			header("location: ../xcx/creds/dash.php?send=invalidchars");
			exit();
		}

		else {

			$username   = "sandbox";
			$apiKey     = "7243012139a674d4336a4953ed2d9c020f4ee3ba68184f70abc0fc9dcb00b7fe";
			$AT         = new AfricasTalking($username, $apiKey);
			$sms        = $AT->sms();
			$datas = array();

			if (isset($group) && $group == 'afya'){

				$sql = "SELECT phone FROM afya;";
				$rslt = mysqli_query($conn, $sql);
				$rsltchk = mysqli_num_rows($rslt);

				if ($rsltchk < 0) {
					# code...
					header("location: ../xcx/creds/dash.php?send=invalidchars");
					exit();
				}
 
				else {

					while($row = mysqli_fetch_assoc($rslt)) {

						$datas[] = $row;

						foreach ($datas as $data) {
							# code..
							$recipients = ''.$data['phone'].', ';

							try {
	   						 // Thats it, hit send and we'll take care of the rest
						    $result = $sms->send([
						        'to'      => $recipients,
						        'message' => $text
						      
						    ]);

						    header("location: ../xcx/creds/dash.php?send=afyasuccess");
							}

							catch (Exception $e) {
							    echo "Error: ".$e->getMessage();

							}

						}
							
					}

				}
				exit();

			}

			if (isset($group) && $group == 'kilimo') {

				$sql = "SELECT phone FROM kilimo;";
				$rslt = mysqli_query($conn, $sql);
				$rsltchk = mysqli_num_rows($rslt);

				if ($rsltchk < 0) {
					# code...
					header("location: ../xcx/creds/dash.php?send=invalidchars");
					exit();
				}
 
				else {

					while($row = mysqli_fetch_assoc($rslt)) {

						$datas[] = $row;

						foreach ($datas as $data) {
							# code..
							$recipients = ''.$data['phone'].', ';

							try {
	   						 // Thats it, hit send and we'll take care of the rest
						    $result = $sms->send([
						        'to'      => $recipients,
						        'message' => $text
						       
						    ]);

						    header("location: ../xcx/creds/dash.php?send=kilimosuccess");
							}

							catch (Exception $e) {
							    echo "Error: ".$e->getMessage();

							}

						}
							
					}

				}
				exit();
			}

			if (isset($group) && $group == 'both') {

				$sql = "SELECT phone FROM afya UNION SELECT phone FROM kilimo;";
				$rslt = mysqli_query($conn, $sql);
				$rsltchk = mysqli_num_rows($rslt);

				if ($rsltchk < 0) {
					# code...
					header("location: ../xcx/creds/dash.php?send=invalidnum");
					exit();
				}
 
				else {

					while($row = mysqli_fetch_assoc($rslt)) {

						$datas[] = $row;

						foreach ($datas as $data) {
							# code..
							$recipients = ''.$data['phone'].', ';

							try {
	   						 // Thats it, hit send and we'll take care of the rest
						    $result = $sms->send([
						        'to'      => $recipients,
						        'message' => $text
						      
						    ]);
						    header("location: ../xcx/creds/dash.php?send=bothsuccess");
							}

							catch (Exception $e) {
							    echo "Error: ".$e->getMessage();

							}

						}
							
					}

				}
				exit();

			}

		}
	}	


}

