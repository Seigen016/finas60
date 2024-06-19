<?php
    include 'connection.php';
    include 'functions.php';
    $loggedIn = isset($_SESSION['email']) === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title?></title>
</head>
<body>

    <nav class="navbar">
        <ul>
            <li class="home"><a href="index.php">HOME</a></li>
            <li class="about"><a href="about.php">About us</a></li>

            <?php if ($loggedIn): ?>
        <div class="logout">
            <form action="index.php" method="post" >
                <input type="submit" name="logout" value="Logout" id="logout">
            </form>
        </div>
        <?php else: ?>
            <div class="logout">
                <form action="index.php" method="post" id="buttonform">
                    <a href="register.php" class="login" id="button">Login </a>
                </form>
            </div>
        <?php endif; ?>
        </ul>
    </nav>  
</body>
</html>

<?php
if(isset($_POST["logout"])){
    session_destroy();
    header("Location: register.php");
}
?>




<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    *{
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;
    }
    a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
    }
    .navbar{
        position: absolute;
        width: 100%;
    }
    .navbar ul{
        list-style-type: none;
        background-color: #B19470;
        overflow: hidden;
    }

    .navbar a{
        color: white;
        text-decoration: none;
        padding: 15px;
        display: block;

    }
    .navbar li{
        float: left;

    }
    .logout{
        position: absolute;
        z-index: 999;
        height: 10%;
        margin: auto;
        color:#333;
        right: 3vw;
        
    }

    #buttonform {
        padding: 0;
        background: none;
        border: none;
        outline: none;
        box-shadow: none;
        color: white;
        right: 3vw;
    }
    #logout {
        margin-top: 3vh;
        padding: 0;
        background: none;
        border: none;
        outline: none;
        box-shadow: none;
        color: white;
        right: 3vw;
    }
    
</style>