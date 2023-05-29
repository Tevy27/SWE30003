<?php
    session_start();
    session_unset();
    session_destroy();
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Log Out</title>
</head>
<body>
    <header>
        
        <?php require 'navigation.php' ?>
    </header>
    <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>You have been logged out. <a href="login.php">Login again.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <footer>
        <?php require 'footer.php'?>
    </footer>
</body>
</html>