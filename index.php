<?php
session_start();
    if(isset($_SESSION['userId']) && isset($_SESSION['userName'])){
        header("location:./sales.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--===== CSS =====-->
        <link rel="stylesheet" href="./css/styles.css">

        <title>Sales Entry</title>
    </head>
    <body>
        <div class="l-form">
            <form action="config/session.php" class="form" method="post">
                <h1 class="form__title">Sign In</h1>

                <div class="form__div">
                    <input type="text" class="form__input" name="username" placeholder=" ">
                    <label for="" class="form__label">UserName</label>
                </div>

                <div class="form__div">
                    <input type="password" class="form__input" name="password" placeholder=" ">
                    <label for="" class="form__label">Password</label>
                </div>

                <input type="submit" class="form__button" name="btn-login" value="Log In">
            </form>
        </div>
    </body>
</html>