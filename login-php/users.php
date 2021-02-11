<?php
include_once("db.php");

$sql = "SELECT * FROM users";

	if($result = mysqli_query($mysqli,$sql))
		{
			$rows = array();
			while($row = mysqli_fetch_assoc($result))
				{
					$row['token'] = $row['id'];
					$rows[] = $row;
					$row['token'] = $row['id'];
				}

			 echo json_encode($rows);
		}

			else
		{
			http_response_code(404);
		}
?>