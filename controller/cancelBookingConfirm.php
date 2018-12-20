<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $reason = htmlentities(trim($_POST['reason']));
    $bookingId = $_POST['booking'];
    $cancelledBy = $_SESSION['username'];
    if(cancelBookingStatus($bookingId, $reason, $cancelledBy)){

        echo "Here";
        header('Location:../requestSuccessful.php');

    }else {

        header("Location:../unsuccessfulRequest.php");
    }

}

?>