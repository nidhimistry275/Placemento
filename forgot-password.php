<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM `users` WHERE email='$email'";

	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		header("Location: reset-password.php");
	} 
	else {
		echo "<script>alert('Your Email ID is not registered Yet.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Placemento</title>

	<link href="./img/Favicon.png" rel="icon">
</head>
<body>
	<div class="logo" align="center">
        <img src="./img/Placemento.png" alt="logo" />
    </div>
    <br />
    <br />
	<div class="container1" style="min-height:150px;">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 22px; font-weight: 700;">Enter Email Id</p>
            <br/>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>