<?php

function execute($query){

    $conn= mysqli_connect('localhost','root','','cbs');

        $result = mysqli_query($conn,$query);
        mysqli_close($conn);

        return $result;


}
?>