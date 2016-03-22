<?php
require_once 'php/autoload.php';
require_once 'php/functions.php';
session_start();

if (!$_SESSION['username']) {
    header('Location: login.php');
    die;
}

$cnt = 0;
$data = DbStorage::showCards();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cram</title>
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
            <?php if ($_SESSION): ?>
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
        <h3>Play Flashcards Set</h3>
    </div>
    <div class="">
        <div class="panel">
                <div class="panel-heading">
                    <div class="col-sm-6 col-sm-offset-1">
                        <h5>FRONT</h5>
                    </div>
                    <div class="col-sm-3">
                        <h5>BACK</h5>
                    </div>
                </div>
            <br>
            <br>
                <div id="q" class="panel-body">
<!--                    <div class="col-sm-4 col-sm-offset-1">-->
<!--                        <div class="panel panel-warning"  style="min-height: 100px">-->
<!--                            <p style="padding: 1em"></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-sm-2">-->
<!--                        <button class="btn alert-success" onclick="show(1)">See the answer</button>-->
<!--                    </div>-->
<!--                    <div class="col-sm-4">-->
<!--                        <div class="panel panel-warning" id="1" style="min-height: 100px; display: none">-->
<!--                            <p style="padding: 1em"></p>-->
<!--                        </div>-->
<!--                    </div>-->
                    <?php foreach($data as $key=>$value): ?>
                        <?php $cnt++;?>
                        <div class="col-sm-4 col-sm-offset-1">
                            <div class="panel panel-warning"  style="min-height: 100px">
                                <p style="padding: 1em"><?=$value['question'] ?></p>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn alert-success" onclick="show(<?=$cnt?>)">See the answer</button>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-warning"  style="min-height: 100px;">
                                <p id="<?=$cnt?>" style="padding: 1em;  visibility: hidden;"><?=$value['answer'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
<script>
    function show(id){
        $('#' + id).css('visibility', 'visible');
    }
</script>
</html>