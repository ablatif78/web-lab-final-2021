<?php

session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		$query = "select * from users where user_name = '$user_name' limit 1";
		$result = mysqli_query($con, $query);

		if ($result) {
			if ($result && mysqli_num_rows($result) > 0) {

				$user_data = mysqli_fetch_assoc($result);

				if ($user_data['password'] === $password) {

					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: index.php");
					die;
				}
			}
		}

		echo "Incorrect username or password!";
	} else {
		echo "Incorrect username or password!";
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<div class="box">
		<form method="post">
			<div class="login">Log In</div>

			<input class="text" type="text" name="user_name"><br><br>
			<input class="text" type="password" name="password"><br><br>
			<input class="button" type="submit" value="Log In"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>

</html>