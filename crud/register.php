<?php
session_start();

$userFile = 'data/users.json';
$users = file_exists($userFile) ? json_decode(file_get_contents($userFile),true):[];
function saveUsers($users,$file){
    file_put_contents($file,json_encode($users,JSON_PRETTY_PRINT));
}

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email=  $_POST['email'];
    $password = $_POST['password'];
    if(empty($username) || empty($password) || empty($email)){
        $errorMessage = "PLease Fill all the fields.";
    }else{
        if(isset($users[$email])){
            $errorMessage = "Email Alrady exists.";
        }else{
            $users[$email] = [
                'username'=>$username,
                'password'=>$password,
                'role'=>''
            ];
            saveUsers($users,$userFile);
            $_SESSION['email']=$email;
            $_SESSION['password'] = $password;
            header("location: loging.php");
        }
    }
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
            <h1>Welcome Register Form</h1>
            </div>
        </div>
        <div class="row">
            <div class="column column-60">
                <?php if($errorMessage){
                    echo $errorMessage;
                } ?>
            </div>
        </div>
        <div class="row">
            <div class="column column-60">
                <form action="" method="POST">
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username">
                    <label for="email">Enter Email</label>
                    <input type="email" name="email" id="email">
                    <label for="password">Password </label>
                    <input type="password" name="password" id="password" >
                    <button type="submit" name="register">Register</button>
                    <p> Already have an account?  <a href="loging.php">Login here</a></p>
                </form>
            </div>
        </div>
    </div>    


</body>
</html>