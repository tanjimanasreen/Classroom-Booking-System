<?php

require('../model/connect.php') ;
require('../model/query.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $dept = htmlentities(trim($_POST['department']));

    if(addDepartment($dept)){

        header('Location:../requestSuccessful.php');

    }else{

        header('Location:../unsuccessfulRequest.php');

    }
}

?>