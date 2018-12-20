<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

$room =" ";

if(isset($_REQUEST['room'])) $room = htmlentities(trim($_REQUEST['room']), ENT_QUOTES);

if(!empty($room)){

    if(!isUniqueRoom($room)){

        echo "Room Exists!!";
    }
}

?>