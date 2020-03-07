<?php
    include('verify_cookies.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Log in</title>
        <style>
            a {
                text-decoration: none;
                color: black;
            }

            a:visited {
                color: black;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <form method="post" action="connection.php">
                <p>
                    <label for="login">Login: </label>
                    <input type="text" name="login">
                </p>  
                <p>
                    <label for="password">Password: </label>
                    <input type="password" name="password">
                </p> 
                <p>
                    <label for="remember_login">Remember login</label>
                    <input type="radio" name="remember_login" value="remember">
                </p>
                <p>
                    <input type="submit" name="logIn" value="Log in">
                </p>
            </form>
            <p>
                <button><a href="http://localhost:8080/sites/sql_practice/member_area/index.php">Sign up</a></button>
            </p>
        </div>
    </body>
</html>