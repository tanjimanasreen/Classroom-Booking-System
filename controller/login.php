<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

if($_SERVER['REQUEST_METHOD']=="POST")
{
    session_start();

    $username = htmlentities(trim($_POST['id']),ENT_QUOTES);
    $password = md5($_POST['password']);

    if(checkUser($username, $password)){
        $_SESSION['username'] = $username;

        $res = getUserType($username, $password);
        $type = $res['type'];
        $status = $res['status'];
        $_SESSION['userType'] = $type;
        //print_r($status);

        //echo $status;

        if($type==1)
        {
            header('Location:../adminhome.php');
        }else{

            if($status)
            {
                header('Location:../facultyhome.php');
            }else{
                header('Location:../registrationPending.html');
            }

        }

    }else{

        header('Location:../invalidUser.html');
    }

}




?>