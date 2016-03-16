<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup</title>
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
        <h3>Sign up for your FREE account</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="userName" placeholder="Enter username">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password">
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
                    <button type="submit" class="btn btn-success">Sign Up</button>
                </div>
            </div>
            <div class="form-group">
                <p class="text-center">By clicking "Sign Up" you agree to our <a href="#">Terms of Use</a> and
                    <a href="#">Privacy Policy</a>.</p>
            </div>
        </form>
    </div>
    <div class="panel-footer">
        <h5 class="text-center">Already have an account? <a href="login.php">Login</a> </h5>
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