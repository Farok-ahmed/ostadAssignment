<?php
 require_once "inc/function.php";
 $info = '';

 $task =$_GET['task'] ?? 'report';
 $error =$_GET['error'] ?? '0';
 if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $roll = $_POST['roll'];
    if($fname !='' && $lname !='' && $roll !=''){
        $result=addStudent($fname,$lname,$roll);
        if($result){
            header("Location: index.php?task=report");
        }else{
            header("Location: index.php?task=report&error=1");
        }
    }
 }

 if('seed'==$task){
    seed();
    $info = "Seeding is compleate";
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role menagement</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60">
                <h1>Welcome My Crud Project</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio distinctio qui nemo facilis. Illo aperiam officia facere, aliquam recusandae omnis!</p>
                <?php include_once("inc/template/nav.php"); ?>
                <hr>
                <?php 
                if($info !=''){
                    echo "<p> {$info} </p>";
                }
                ?>
            </div>
        </div>
        <?php if('1' == $error):?>
        <div class="row">
            <div class="column column-60">
                <blockquote>Duplicat Roll</blockquote>
            </div>
        </div>
        <?php endif; ?>

        <?php if('report' == $task):?>
        <div class="row">
            <div class="column column-60">
                <?php echo generateReport(); ?>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if('add' ==$task):?>
        <div class="row">
            <div class="column column-60">
                <form action="index.php?tast=report" method="POST">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname">
                    <label for="fname">Last Name</label>
                    <input type="text" name="lname" id="fname">
                    <label for="roll">Roll</label>
                    <input type="number" name="roll" id="roll">
                    <button type="submit" name="submit">Save</button>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>