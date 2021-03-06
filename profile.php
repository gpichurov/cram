<?php
require_once 'php/autoload.php';
require_once 'php/functions.php';
session_start();
if (!$_SESSION['username']) {
    header('Location: login.php');
    die;
}
$data = DbStorage::selectCards();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cram</title>
    <!--<link rel="stylesheet" href="css/reset.css">-->
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
            <div class="panel-body">
                <div>

                    <div class="tab-content"  style="min-height: 400px;">
                        <div role="tabpanel" class="tab-pane active" id="created">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="col-sm-2">Set ID</th>
                                        <th class="col-sm-8">Set Title</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($data as $key=>$value): ?>
                                            <tr>
                                                <td class="col-sm-2">
                                                    <a href="playFlashcard.php?id=<?=$value['id'] ?>"><?=$value['id'] ?></a>
                                                </td>
                                                <td class="col-sm-7">
                                                    <a href="playFlashcard.php?id=<?=$value['id'] ?>"><?=$value['name'] ?></a>
                                                </td>
                                                <td class="col-sm-1">
                                                    <div class="btn-group " role="group" aria-label="...">
                                                        <a href="deleteFlashcards.php?id=<?=$value['id'] ?>" onclick="return confirm('Are you sure?')" type="button" class="btn btn-default glyphicon glyphicon-trash"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
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
