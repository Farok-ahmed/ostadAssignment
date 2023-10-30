<?php
session_start();
$error = false;

$username=$_POST['username'];
$password = $_POST['password'];

$fp = fopen("e:\\New folder (2)\\ostadAssignment\\crud\\data\\users.txt",'r');
if($username && $password){
while($data = fgetcsv($fp)){
        $_SESSION['loggedin'] = false;
        $_SESSION['user']=false;
        $_SESSION['role']=false;
        if($data[0]==$username && $data[1]==$password){
            $_SESSION['loggedin']=true;
            $_SESSION['user']=$username;
            $_SESSION['role']=$data[2];
            header("location: index.php");
        }
    }
    if(!$_SESSION['loggedin']){
        $error = true;
    }
}


if(isset($_POST['logout'])) {
    $_SESSION['loggedin'] = false;
    $_SESSION['user']=false;
    $_SESSION['role']=false;
    session_destroy();
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
                <h2>Simple Loging Form</h2>
            </div>
        </div>
        <div class="row">
            <div class="column column-60">
                <?php 
                if($error){
                    echo "<blockquote>Username and Password Didn't Match</blockquote>";
                }
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                    echo "Hello Admin, Welcome";
                }else{
                    echo "Hello Stranger, Loging Below";
                } ?>
            </div>
        </div>
        <div class="row">
            <div class="column column-60">
                <?php if(false == $_SESSION['loggedin']): ?>
                <form action="" method="POST">
                    <label for="username">Username</label>
                    <input type="text" name="username" >
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <button type="submit" name="submit" >Loging</button>
                </form>
                <?php else: ?>
                    <form action="loging.php" method="POST">
                        <input type="hidden" name="logout" value="1" >
                    <button type="submit" name="submit" >log out</button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>