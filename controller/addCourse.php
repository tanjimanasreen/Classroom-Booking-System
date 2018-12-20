<?php
require('../model/connect.php') ;
require('../model/query.php');

if($_SERVER["REQUEST_METHOD"]=="POST") {

    $course = htmlentities(trim($_POST['coursename']));
    $dept = htmlentities(trim($_POST['department']), ENT_QUOTES);

    $res = getDepartmentId($dept);
    $deptid = $res['id'];

    echo $course . " " . $deptid;

     if(addCourse($course, $deptid)){

         header('Location:../requestSuccessful.php');

     }else{

         header('Location:../unsuccessfulRequest.php');

     }

}
?>