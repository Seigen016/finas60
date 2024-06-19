<?php
    include 'connection.php';
    include 'navigation.php';
    include 'functions.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <br><br><br><br><br>
<div class="bod">
    <svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
            <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#B5C18E" stroke-width="20" sketch:type="MSShapeGroup"></path>
            <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EADBC8" stroke-width="11" sketch:type="MSShapeGroup"></path>
            <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#B5C18E" stroke-width="11" sketch:type="MSShapeGroup"></path>
            <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#C7B7A3" stroke-width="17" sketch:type="MSShapeGroup"></path>
            <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#EADBC8" stroke-width="14" sketch:type="MSShapeGroup"></path>
        </g>
    </svg>
    <div class="message-box">
        <h1>Know more</h1>
        <h1>about us</h1>

        <p>Welcome to our Website,</p>
        <div div class="buttons-con">
            <div class="action-link-wrap">
                
            </div>
        </div>
    
        <div class="user">
            <?php
                if (isset($_SESSION['email'])) {
                        $email = $_SESSION['email'];
                        $username = $_SESSION['username'];

                            // Now you can use $email and $username as needed
                        echo "$username ";
                        } else {
                        echo "Guest";
                        }
                        if(isset($_POST["logout"])){
                            session_destroy();
                            header("Location: register.php");
                        }
            ?>
        </div>
    </div>
</div>
</body>
</html>

