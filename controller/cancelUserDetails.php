<?php
require_once('../model/connect.php') ;
require_once('../model/query.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $userId = $_POST['userId'];

    if(cancelUser($userId)){

        header('Location:../adminhome.php');

    }else {

        header("Location:../unsuccessfulRequest.php");
    }

}

?>