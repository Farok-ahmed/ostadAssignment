<?php

function calculateAverageGrades($studentGrades){
    foreach($studentGrades as $student=>$grades){
        $totalGrades = array_sum($grades);
        $numSubject = count($grades);
        $averageGrades = $totalGrades/$numSubject;
        echo "$student - Average Grades - {$averageGrades}"."\n";
};
}

$studentGrades=[
    'Student1'=>['Math'=>80,'English'=>70,'Science'=>90],
    'Student2'=>['Math'=>58,'English'=>80,'Science'=>95],
    'Student3'=>['Math'=>88,'English'=>75,'Science'=>80],
];

calculateAverageGrades($studentGrades);


