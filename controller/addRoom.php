<?php

require('../model/connect.php') ;
require('../model/query.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $room = htmlentities(trim($_POST['room']));
    $type = $_POST['roomtype'];
    $location = $_POST['roomlocation'];

    $res1 = getRoomTypeId($type);
    $res2 = getRoomLocationId($location);

    $typeId = $res1['id'];
    $locationId = $res2['id'];

   if(addingRoom($room,$typeId,$locationId)){

        header('Location:../requestSuccessful.php');

    }else{

        header('Location:../unsuccessfulRequest.php');

    }
}


?>