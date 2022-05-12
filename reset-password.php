<?php 

include 'config.php';

session_start();

error_reporting(0);
$email=$_SESSION['email'];
// echo $email;

if (isset($_POST['submit'])) {
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM `users` WHERE `email`='$email'";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {

            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            $email = $_SESSION['email'];
            // echo $email;

            $sql="UPDATE `users` SET `password` = '$password' WHERE `users`.`email` = '$email'";

            // UPDATE `users` SET `password` = 'Rajvee' WHERE `users`.`id` = 64;
            
			// $sql = "INSERT INTO `users` (`email`, `password`, `selector`) VALUES ('$email', '$password', '$selector')";

			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Your Password is changed.')</script>";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
                // echo "Hello";
                header("Location: index.php");
			} 
		} 
		else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}		
	} 
	else {
		echo "<script>alert('Password Not Matched.')</script>";
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
	<div class="container1" style="min-height:170px;">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 22px; font-weight: 700;">Create New Password</p>
            <br/>

            <div class="input-group">
                <input type="text" placeholder="Create New Password" name="password" value="<?php echo $_POST['password']; ?>"
                    required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Confirm New Password" name="cpassword"
                    value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <br />

			<div class="input-group">
				<button name="submit" class="btn" style="width:200px;">Change Password</button>
			</div>
		</form>
	</div>
</body>
</html>