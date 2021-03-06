<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>about</title>
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
        <h3>About Cram</h3>
    </div>
    <div class="panel-body">
        <h4>Why Flashcards?</h4>
        <p>Flashcards are the fastest and best way to memorize almost any type of information. Whether you're
            memorizing multiplication tables, vocabulary lists, a new language, or just plain old definitions,
            flashcards will help you organize the information in a way that helps you learn more efficiently.
            Cram is especially useful because we utilize the Leitner System of studying. This system has helped
            thousands of students around the world memorize large amounts of information.</p>
        <h4>Cram Mode and The Leitner System</h4>
        <p>In the early 70's a German psychologist named Sebastian Leitner devised a learning system that made
            selective learning possible with less effort than the traditional method of studying a set of
            flashcards sequentially.</p>
        <p>Leitner’s system consists of a cardboard box separated into a number of compartments. The compartments
            are filled with flashcards that are moved from one compartment to another, according to the current level
            of knowledge. When a flashcard is answered correctly, it is promoted to the next compartment. When a
            flashcard is answered incorrectly, it is demoted to the first compartment.</p>
        <h4>How It Works</h4>
        <ul>
            <li>When studying the flashcards in a given level, you go through the set normally and choose if it’s
                right or wrong.</li>
            <li>When all of the flashcards from the compartment have been answered you are presented with a summary
                of the results.</li>
            <li>When the results are saved, all flashcards that were answered correctly are promoted to the next level.
                Flashcards that were incorrect are demoted to the first level.</li>
            <li>A set is complete when all flashcards are in the highest level.</li>
        </ul>
        <p>The result of the Leitner System is that you are automatically pushed towards focusing on the more difficult
            flashcards that are giving you the most problems.</p>
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