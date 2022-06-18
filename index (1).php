<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
	header("Location: https://code-storm-12.herokuapp.com/");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: https://code-storm-12.herokuapp.com/");
	} else {
		// echo "<script>alert('Woops! Email or Password is Wrong.')</script>";

		$msg = "Woops! Email or Password is Wrong.";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="image/logo.png" type="image/png">


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form - CODESTROM</title>
</head>

<body>

	<div class="loader-container">
		<img src="image/1.gif" alt="CODESTORM">
	</div>

	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group" style="color: #2CA463;">
				<a href="https://code-storm-12.herokuapp.com/"><button name="submit" class="btn">Login</button></a>
			</div>

			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>

			<p class="alert p-0 my-2 font-weight-bold"><?php if (isset($msg)) echo $msg ?></p>
		</form>
	</div>

	<!-- custom js file link  -->
	<script src="script.js"></script>
</body>

</html>