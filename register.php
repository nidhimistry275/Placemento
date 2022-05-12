
<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$selector = $_POST['selector'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM `users` WHERE `email`='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {

            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            
			$sql = "INSERT INTO `users` (`email`, `password`, `selector`) VALUES ('$email', '$password', '$selector')";

			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";

                if($selector == "Job_Seeker"){
                    header("Location: create_employee.php");
                }
                if($selector == "Company"){
                    header("Location: create_company.php");
                }
			} 
			else 
			{
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
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
    <br/>
    <div class="container1">
        <form action="" method="POST" onsubmit="return validation()" class="login-email" >
            <p class="login-text" style="font-size: 28px; font-weight: 700;">Register</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" required>
                <span id="emailid" style="color:red; font-size:12px"></span>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Create New Password" name="password" id="password" value="<?php echo $_POST['password']; ?>"
                    required>
                    <span id="pass" style="color:red; font-size:12px"></span>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword"
                    value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <br />
            <div align="center">
                <div class="check">
                    <input type="radio" id="Job_seeker" name="selector" value="Job_Seeker" required>
                    <label for="Job_seeker">Job Seeker</label>
                </div>
                <div class="check">
                    <input type="radio" id="Company" name="selector" value="Company" required>
                    <label for="Company">Company</label>
                </div>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
        </form>

    </div>
</body>
<script>
     function validation(){
    var emailid=document.getElementById('email').value;
    var pass=document.getElementById('password').value;
    if((pass.length<=5) || (pass.length>20)){
            document.getElementById('pass').innerHTML="Password length must be between 5 and 20";
            return false;
        }
    /*if(emailid.indexof('@')<=0)
    {
        document.getElementById('pass').innerHTML="invalid type of email address";
        return false;
    }*/
    if((emailid.charAt(emailid.length-4)!='.')&&(emailid.charAt(emailid.length-3)!='.'))
    {
        document.getElementById('emailid').innerHTML="Invalid type of email address";
        return false;
    }
     }
    </script>

</html>

<?php 
        $_SESSION['email'] = $_POST['email'];
?>
