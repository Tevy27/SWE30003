<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 require 'dbConnect.php'
?>

<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Login</title>
</head>
<body>
    <header>
        
        <?php require 'navigation.php' ?>
    </header>

    <br><br><br>
           <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login to make a purchase.</p>
                                <form method="post" action="login_submit.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">Don't have an account yet? <a href="signup.php">Register</a></div>
                        </div>
                    </div>
                </div>
           </div>
           <br><br><br><br><br>
<?php 
// require_once('settings.php');
// $conn = @mysqli_connect($host,$user,$pwd,$sql_db);
// if ($conn) {

// 	if (isset($_POST['username'])) {
// 	$username=$_POST['username'];
// 	$password=$_POST['password'];

// 	$sql = "SELECT * FROM manager WHERE username='$username'AND password='$password'";			//check the data with database
// 	$result = mysqli_query($conn, $sql);
// 	if(mysqli_num_rows($result) > 0)
// 	{
// 		session_start();
// 		//info
// 		$_SESSION['login_username'] = $username;
// 		$_SESSION['login_password'] = $password;
// 		header("location:manage.php");
// 	}
// 	else{
// 		$manager_msg = "ERROR: Wrong user name or password";					
// 		header("location:manager_login.php?manager_msg=$manager_msg");
// 	}
// }

// }
// else{
// 	echo "Unable to connect to the database.";				
// }

 ?>

</body>
<footer>
    <?php require 'footer.php'?>
</footer>
</html>