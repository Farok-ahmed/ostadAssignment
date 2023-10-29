<?php
session_start();

$error = false;
$username = $_POST['username'];
$password = $_POST['password'];
$fileName = "/home/farok/Desktop/ostadAssignment/crud/data/users.txt";
$fp = fopen($fileName,'r');
if($username && $password){
    $_SESSION['loggedin']=false;
    $_SESSION['user']=false;
    $_SESSION['role']=false;

while($data = fgetcsv($fp)){
   
        if($data[0]== $username && $data[1]==$password){
            $_SESSION['loggedin']=true;
            $_SESSION['user']=$username;
            $_SESSION['role']=$data[2];
            header("Location: index.php");
        }
    }
    if(!$_SESSION['loggedin']){
        $error = true;
    }
}

if(isset($_POST['logout'])){
    $_SESSION['loggedin']=false;
    $_SESSION['user']=false;
    $_SESSION['role']=false;
    session_destroy();
    header("Location: index.php");

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
            <h1>Welcome Loging Form</h1>
            </div>
        </div>
        <div class="row">
            <div class="column column-60">
                <?php
                if($error){
                    echo '<blockquote>User name & password wrong</blockquote>';
                }
                  if($_SESSION['loggedin']){
                    echo "Hello Admin, Weclome";
                  }else{

                      echo "<h3>Hello Stranger, Login Below</h3>";
                  }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="column column-60">
                <?php if(!$_SESSION['loggedin']): ?>
                <form action="" method="POST">
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username">
                    <label for="password">Password </label>
                    <input type="password" name="password" id="password" >
                    <button type="submit" name="submit">Loging</button>
                </form>
                <?php else: 
                ?>
                 <form action="loging.php" method="POST">
                    <input type="hidden" name="logout" value="1">
                    <button type="submit" name="submit">logout</button>
                </form>
                 <?php
                 endif; ?>
            </div>
        </div>
    </div>    


</body>
</html>