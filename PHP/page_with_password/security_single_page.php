<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NASA Access Code</title>
    </head>
<?php
    $password = 'Kangaroo';
    if (!isset($_POST['password']) OR $_POST['password'] !== $password) { 
?>
    <body>
        <div id="wrapper">
            <p>Please enter the password in order to obtain the access code for the central games server of the NASA : </p>
            <form method="post" action="security.php">
                <input type="password" name="password">
                <input type="submit" name="validate" value="Validate">
            </form>
            <p>This page is reserved for NASA staff. If you are not working at NASA, needless to say, you will never find the password! :)</p>
        </div>
    </body>
</html>

<?php 
    } else { 
?>
<body>
        <div id="wrapper">
            <h1>Here are the access codes:</h1>
            <h2>CRD5-GTFT-CK65-JOPM-V29N-24GI-HH29-LLFV</h2>
            <p>This page is reserved for NASA staff. Do not forget to visit it regularly because the access codes are changed weekly.</p>
            <p>NASA thanks you for your visit.</p>
        </div>
    </body>
</html>

<?php
    }
?>


