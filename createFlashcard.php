<?php
require_once 'php/autoload.php';
require_once 'php/functions.php';
session_start();

$data = [];
$errors = [];

if (!$_SESSION['username']) {
    header('Location: login.php');
    die;
}

if ($_POST) {
    $data = $_POST;
    $card = new FlashCards($data['title'], $data['description'], $_SESSION['id']);


    if (!getValue($data, 'title')) {
        $errors[] = 'Title is required';
    }

    if (count($data) < 3) {
        $errors[] = 'At last one question is required';
    }

    function questionsAdd($data, $card){
        array_shift($data);
        array_shift($data);
        $data = array_values($data);
        for ($i = 0; $i < count($data); $i += 2) {
            $question = new Questions($data[$i], $data[$i + 1], DbStorage::checkID($card));
            DbStorage::insertObject($question);
        }
    }
    if (!$errors) {
        DbStorage::insertObject($card);
        questionsAdd($data, $card);
        //header('Location: profile.php');
        //die;
    }

}
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
        <h3>Create a New Flashcard Set</h3>
    </div>
    <div class="panel-body">
        <div class="panel">
            <form class="form-horizontal" role="form" method="post">
                <?php if ($errors):?>
                    <div class="alert alert-danger">
                        <?= implode('<br>', $errors)?>
                    </div>
                <?php endif;?>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="setTitle">Set Title:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="setTitle" placeholder="Enter title" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">Description (Optional):</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control" id="description" rows="5"></textarea>
                    </div>
                </div>
                <div class="page-header text-center">
                    <h4>Create Flashcards</h4>
                </div>
                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-1">
                        <h5>FRONT</h5>
                    </div>
                    <div class="col-sm-5">
                        <h5>BACK</h5>
                    </div>
                </div>
                <div id="q">
                    <div class="form-group" id="1">
                        <div class="col-sm-1">
                            <p class="text-right">#</p>
                        </div>
                        <div class="col-sm-5">
                            <textarea name="front" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="col-sm-5">
                            <textarea name="back" class="form-control"  rows="5"></textarea>
                        </div>
                        <div class="col-sm-1">
                            <button class="glyphicon glyphicon-trash" onclick="removee(1)"></button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-10">
                        <button type="button" class="btn btn-info form-control" onclick="addRow()">ADD NEW CARD</button>
                    </div>
                </div>
                <div class="form-group panel-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success center-block">Submit</button>
                    </div>
                </div>
            </form>
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
    var n = 2;
    var cnt;
    function addRow(){
        cnt = n;
        n++;
        $('#q').append(
            '<div class="form-group" id="' + cnt + '"><div class="col-sm-1"><p class="text-right">#</p></div>' +
            '<div class="col-sm-5"><textarea name="front' + cnt + '" class="form-control" rows="5"></textarea></div>' +
            '<div class="col-sm-5"><textarea name="back' + cnt + '" class="form-control"  rows="5"></textarea></div>' +
            '<div class="col-sm-1"><button class="glyphicon glyphicon-trash" onclick="removee(' + cnt + ')"></button></div></div>'
        );
    }
    function removee(id){
        $('#' + id).remove();
    }
</script>
</html>