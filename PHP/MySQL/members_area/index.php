<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
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
            <form method="post" action="registration.php">
                <p>
                    <label for="login">Login: </label>
                    <input type="text" name="login">
                </p>
                <p>
                    <label for="email">Email address: </label>
                    <input type="email" name="email">
                </p>   
                <p>
                    <label for="password">Password: </label>
                    <input type="password" name="password">
                </p>
                <p>
                    <label for="confirm_pw">Confirm password: </label>
                    <input type="password" name="confirm_pw">
                </p>   
                <p>
                    <input type="submit" name="signUp" value="Sign up">
                </p>
            </form>
            <p>
                <button><a href="http://localhost:8080/sites/sql_practice/member_area/connection_page.php">Log in</a></button>
            </p>
        </div>
    </body>
</html>