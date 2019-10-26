<?php

include_once 'conn.php';

$text = $_POST['broadmess'];
$group = $_POST['group'];

if (isset($group) && $group == 'afya'){

	$number = "SELECT phone FROM afya;";
	$message = $text

}
elseif (isset($group) && $group == 'kilimo') {
	$number = "SELECT phone FROM kilimo;";
	$message = $text;

}
elseif (isset($group) && $group == 'both') {

	$number = "SELECT afya.phone, kilimo.phone FROM afya,kilimo;"
