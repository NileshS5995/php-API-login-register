<?php
include_once("db.php");
$postdata = file_get_contents("php://input");
$postdata = json_decode($postdata);

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

if(isset($postdata) && !empty($postdata))
{
	$pwd = mysqli_real_escape_string($mysqli, trim($postdata->password));
	$username = mysqli_real_escape_string($mysqli, trim($postdata->username));
	 $sql = "SELECT * FROM users where username='$username' and password='$pwd' LIMIT 1";
	if($result = mysqli_query($mysqli,$sql))
		{
			$row = mysqli_fetch_assoc($result);
			$row['token'] = $row['id'];
			 echo json_encode($row);
		} else {
			http_response_code(404);
		}
}
?>