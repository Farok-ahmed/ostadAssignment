<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="column column-60">
                <h1>Welcome Loging Form</h1>
                <form action="index.php" method="POST">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" >
                    <label for="email">Enter Your E-mail</label>
                    <input type="email" name="email" id="email">
                    <label for="password">Password </label>
                    <input type="password" name="password" id="password" >
                    <button type="submit" name="submit">Loging</button>
                </form>
            </div>
        </div>
    </div>    


</body>
</html>