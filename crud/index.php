<?php
 require_once "inc/function.php";
 $info = '';
 $task =$_GET['task'] ?? 'report';
 $error =$_GET['error'] ?? '0';
 $fname = '';
 $lname = '';
 $roll = '';
 if('delete'==$task){
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
    if($id>0){
        deleteStudent($id);
    }
 }
 if('seed'==$task){
    seed();
    $info = "Seeding is compleate";
 }

 
 if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $roll = $_POST['roll'];
    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);
    if($id){
        if($fname !='' && $lname !='' && $roll !=''){
            updateStudent($id,$fname,$lname,$roll);
            header("Location: index.php?task=report");
        }
    }else{

        if($fname !='' && $lname !='' && $roll !=''){
            $result=addStudent($fname,$lname,$roll);
            if($result){
                header("Location: index.php?task=report");
            }else{
                $error = '1';
            }
        }
    }
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
                <form action="index.php?task=add" method="POST">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>">
                    <label for="fname">Last Name</label>
                    <input type="text" name="lname" id="fname" value="<?php echo $lname; ?>">
                    <label for="roll">Roll</label>
                    <input type="number" name="roll" id="roll" value="<?php echo $roll; ?>">
                    <button type="submit" name="submit">Save</button>
                </form>
            </div>
        </div>
        <?php endif; ?> 
        <?php if('edit' ==$task):
          $id = $_GET['id'];
          $student = getStudent($id);
          if($student):    
        ?>
        <div class="row">
            <div class="column column-60">
                <form action="index.php?task=edit" method="POST">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" value="<?php echo $student['fname']; ?>">
                    <label for="fname">Last Name</label>
                    <input type="text" name="lname" id="fname" value="<?php echo $student['lname']; ?>">
                    <label for="roll">Roll</label>
                    <input type="number" name="roll" id="roll" value="<?php echo $student['roll']; ?>">
                    <button type="submit" name="submit">update</button>
                </form>
            </div>
        </div>
        <?php 
        endif;
        endif ?>
    </div>
</body>
</html>