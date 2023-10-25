<?php

define("DB_NAME","e:\\New folder (2)\\ostadAssignment\\crud\\data\\db.txt");

function seed(){
    $data = array(
        array(
            'id'=>1,
            'fname'=>'Farok',
            'lname'=>'Ahmed',
            'roll'=>01
        ),
        array(
            'id'=>2,
            'fname'=>'Sajal',
            'lname'=>'Ahmed',
            'roll'=>02
        ),
        array(
            'id'=>3,
            'fname'=>'Raju',
            'lname'=>'Ahmed',
            'roll'=>03
        ),
        array(
            'id'=>4,
            'fname'=>'Yesain',
            'lname'=>'Arafat',
            'roll'=>04
        )
    );
   
    $serializeData = serialize($data);
    file_put_contents(DB_NAME,$serializeData);
}

function generateReport(){
    $serializeData = file_get_contents(DB_NAME);
    $students=  unserialize($serializeData);
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Roll</th>
            <th>Action</th>
        </tr>
        <?php
        foreach($students as $student){
            ?>
            <tr>
            <td>
                <?php printf("%s %s",$student['fname'],$student['lname']); ?>
            </td>
            <td>
                <?php printf("%s",$student['roll']); ?>
            </td>
            <td>
                <?php printf('<a href="index.php?task=edit&id">Edit</a> | <a href="index.php?task=delate&id">Delate</a>',$student['id'],$student['id']); ?>
            </td>
            
            </tr>
        <?php
        }
        ?> 
    </table>
    <?php
}
function addStudent($fname,$lname,$roll){
    $found = false;
    $serializeData = file_get_contents(DB_NAME);
    $students=  unserialize($serializeData);
    $newId= count($students)+1;
    foreach($students as $_student){
        if($_student['roll'] == 'roll'){
            $found =true;
            break;
        }
    }
    if(!$found){

        $student=  array(
            'id'=>$newId,
            'fname'=>$fname,
            'lname'=>$lname,
            'roll'=>$roll
        );
        array_push($students,$student);
        $serializeData = serialize($students);
        file_put_contents(DB_NAME,$serializeData);
        return true;
    }
    return false;
}