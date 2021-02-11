<?php
include_once("db.php");
$postdata = file_get_contents("php://input");
$postdata = json_decode($postdata);
$postdata = $postdata->data;
$errorSatus = false;

 if (empty($postdata->name)) {
 	$error = [
	 	'error' => true,
	 	'message' => 'Name is required field',
 	];
 	echo json_encode($error);
 	return;
 }

 if(!$postdata->username || empty($postdata->username)) {
 	$error = [
	 	'error' => true,
	 	'message' => 'Username is required field'
 	];
 	echo json_encode($error);
 	return;
 }

 if(!$postdata->password || empty($postdata->password)) {
 	$error = [
	 	'error' => true,
	 	'message' => 'Password is required field'
 	];
 	echo json_encode($error);
 	return;
 }

 if(!$postdata->name || empty($postdata->name)) {
 	$error = [
	 	'error' => true,
	 	'message' => 'Name is required field'
 	];
 	echo json_encode($error);
 	return;
 }

if(isset($postdata))
{
	$name = trim($postdata->name);
	$pwd =  trim($postdata->password);
	$username = trim($postdata->username);
	$role = trim($postdata->role);
	$sql = "INSERT INTO users(name,username,password,role) VALUES ('$name','$username','$pwd', '$role')";
	if ($mysqli->query($sql) === TRUE) {
		$authdata = [
		'name' => $name,
		'password' => '',
		'username' => $username,
		'role' => $role
		//'Id' => mysqli_insert_id($mysqli)
		];
		echo json_encode($authdata);
	}
}

?>