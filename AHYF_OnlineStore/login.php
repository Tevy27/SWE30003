<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 require 'dbConnect.php';
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
    <?php if(isset($_GET['login_error'])): ?>
        <p class="error-message">Error: Incorrect email or password. Try Again!</p>
    <?php endif; ?>


           <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login to make a purchase.</p>
                                <form method="post" action="loginProcess.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
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

</body>
<footer>
    <?php require 'footer.php'?>
</footer>
</html>