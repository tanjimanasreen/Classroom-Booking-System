<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $id = htmlentities(trim($_POST['id']), ENT_QUOTES);
    $email = htmlentities(trim($_POST['email']), ENT_QUOTES);
    $name = htmlentities(trim($_POST['name']), ENT_QUOTES);
    $phone = htmlentities(trim($_POST['phone']), ENT_QUOTES);
    $dept = htmlentities(trim($_POST['department']), ENT_QUOTES);

    //echo $dept;
    $password = md5($_POST['password']);

    //echo $id." ".$email." ".$name." ".$phone." ".$dept." ".$password;

    $res =  getDepartmentId($dept);
    $deptid = $res['id'];

    if(addUser($id, $name, $email, $phone, $password, $deptid)){

            header('Location:../approveregistration.html');

    }else{

        header('Location:../unsuccessfulRequest.php');

    }

}
?>