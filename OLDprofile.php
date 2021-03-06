<?php
require_once 'php/autoload.php';
require_once 'php/functions.php';
session_start();
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
                        <li><a href="#">Log Out</a></li>
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
        <h3>Welcome $username</h3>
    </div>
    <div class="panel-body">
        <div class="panel">
            <div class="panel-body">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#created" aria-controls="created" role="tab" data-toggle="tab">Created</a>
                        </li>
                        <li role="presentation">
                            <a href="#favorites" aria-controls="favorites" role="tab" data-toggle="tab">Favorites</a>
                        </li>
                    </ul>
                    <div class="tab-content"  style="height: 300px">
                        <div role="tabpanel" class="tab-pane active" id="created">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="col-sm-2">Set Title</th>
                                        <th class="col-sm-2">Cards</th>
                                        <th class="col-sm-2">Subjects</th>
                                        <th class="col-sm-2">Access</th>
                                        <th class="col-sm-2">Created</th>
                                        <th class="col-sm-2">Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="col-sm-2"><a href="cardPlay.php">test</a></td>
                                        <td class="col-sm-2">123</td>
                                        <td class="col-sm-2">Education</td>
                                        <td class="col-sm-2">Public</td>
                                        <td class="col-sm-2">11.11.2123</td>
                                        <td class="col-sm-2">
                                            <div class="btn-group" role="group" aria-label="...">
                                                <button type="button" class="btn btn-default glyphicon glyphicon-heart"></button>
                                                <button type="button" class="btn btn-default glyphicon glyphicon-edit"></button>
                                                <button type="button" class="btn btn-default glyphicon glyphicon-trash"></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2"><a href="#">test2</a></td>
                                        <td class="col-sm-2">23</td>
                                        <td class="col-sm-2">Education</td>
                                        <td class="col-sm-2">Private</td>
                                        <td class="col-sm-2">22.11.2123</td>
                                        <td class="col-sm-2">
                                            <div class="btn-group " role="group" aria-label="...">
                                                <button type="button" class="btn btn-default glyphicon glyphicon-heart-empty"></button>
                                                <button type="button" class="btn btn-default glyphicon glyphicon-edit"></button>
                                                <button type="button" class="btn btn-default glyphicon glyphicon-trash"></button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="favorites">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="col-sm-2">Set Title</th>
                                        <th class="col-sm-2">Cards</th>
                                        <th class="col-sm-2">Subjects</th>
                                        <th class="col-sm-2">Access</th>
                                        <th class="col-sm-2">Created</th>
                                        <th class="col-sm-2">Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="col-sm-2"><a href="#">test</a></td>
                                        <td class="col-sm-2">123</td>
                                        <td class="col-sm-2">Education</td>
                                        <td class="col-sm-2">Public</td>
                                        <td class="col-sm-2">11.11.2123</td>
                                        <td class="col-sm-2">
                                            <div class="btn-group" role="group" aria-label="...">
                                                <button type="button" class="btn btn-default glyphicon glyphicon-heart"></button>
                                            </div>
                                        </td>
                                    </tr>
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
