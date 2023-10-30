<?php
session_start();

if(!$_SESSION[$email] && !$_SESSION[$password]){
    header("location: loging.php");
}else{
    header("location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        body{
            margin: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60">
                <h3>Welcome Loging Form</h3>

            </div>
        </div>
        <row>
            <div class="column column-60">
                <form action="index.php" method="POST">
                    <label for="username">Your User Name</label>
                    <input type="text" name="username" id="username" >
                    <label for="password">Password</label>
                    <input type="password" name="password">
                    <button type="submit">Loging</button>
                    <p>Don’t have an account yet?  <a href="register.php">Sign up</a></p>
                    
                </form>
            </div>
        </row>
    </div>
</body>
</html>