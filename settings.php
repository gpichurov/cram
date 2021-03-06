<?php
require_once 'php/autoload.php';
require_once 'php/functions.php';
session_start();
if (!$_SESSION['username']) {
    header('Location: login.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>settings</title>
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
            <?php if ($_SESSION['username']): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><?= $_SESSION['username']?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="settings.php">Settings</a></li>
                        <li><a href="createFlashcard.php">Create Flashcards</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php endif; ?>
        </ul>

    </div>
</nav>

<main class="container-fluid panel">
    <div class="page-header text-center">
        <h3>Welcome <?= $_SESSION['username']?></h3>
    </div>
    <div class="panel-body">
        <div class="panel">
            <div class="page-header text-center">
                <h4>Change Your Email</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="oldEmail">Old Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="oldEmail" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="newEmail">New Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="newEmail" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel">
            <div class="page-header text-center">
                <h4>Communication</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                            <label class="control-label col-sm-2" for="newsletter">Newsletter:</label>
                            <div class="col-sm-10 checkbox">
                                <label>
                                    <input type="checkbox" id="newsletter">I agree to receive Cram's newsletter
                                    containing news, updates andpromotions relating to Cram products. You can
                                    unsubscribe at any time.
                                </label>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="notifications">Notifications:</label>
                        <div class="col-sm-10 checkbox">
                            <label>
                                <input type="checkbox" id="notifications">I agree to receive notifications
                                from Cram regarding myaccount. You can unsubscribe at any time.
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel">
            <div class="page-header text-center">
                <h4>Change Your Password</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="newPwd">New Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="newPwd" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="oldPwd">Old Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="oldPwd" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwdRep">Repeat password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwdRep" placeholder="Repeat password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</html>