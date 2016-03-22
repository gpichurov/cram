<?php
ini_set('display_errors', 'On');
ini_set('error_reporting', E_ALL);
require_once 'php/autoload.php';
require_once 'php/functions.php';


$data = [];
$errors = [];

if ($_POST) {
    $data = $_POST;
    $user = new Users($data['userName'], $data['pwd']);
    //var_dump($data['pwd'], $data['pwdRep']);

    if (!getValue($data, 'userName')) {
        $errors[] = 'Username is required';
    }

    if (!getValue($data, 'pwd')) {
        $errors[] = 'Password is required';
    }

    if (!$user->checkLogin()){
        $errors[] = 'Wrong username';
    }

    if (!$errors) {
        session_start();
        $_SESSION = $user->checkLogin()[0];
        header('Location: createFlashcard.php');
        die;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
</head>
<body class="container-fluid">

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="index.php">
                <img class="img-responsive" src="images/theLogo.png" alt="">
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <form class="navbar-form navbar-left" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default"  type="button"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </form>
            </li>
            <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>

    </div>
</nav>

<main class="container-fluid panel">
    <div class="page-header text-center">
        <h3>Login to your account</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="post">
            <?php if ($errors):?>
                <div class="alert alert-danger">
                    <?= implode('<br>', $errors)?>
                </div>
            <?php endif;?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter username">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Sign Up</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <p class="text-center"><a href="forgot.php">Forgot your username or password?</a></p>
            </div>
        </form>
    </div>
    <div class="panel-footer">
        <h5 class="text-center">Don't have an account? <a href="signUp.php">Sign up</a> </h5>
    </div>
</main>
<footer class="container-fluid text-center">
    <div class="row">
        <div class="col-sm-2 col-sm-offset-2"><a href="about.php">About</a></div>
        <div class="col-sm-2"><a href="FAQ.php">FAQ</a></div>
        <div class="col-sm-2"><a href="siteMap.php">Site Map</a></div>
        <div class="col-sm-2"><a href="support.php">Support</a></div>
    </div>
</footer>
</body>
</html>