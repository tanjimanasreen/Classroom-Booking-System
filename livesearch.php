<?php

$conn= mysqli_connect('localhost','root','','cbs');

///write new query here
$q=$_GET["q"];

$result1=mysqli_query($conn,"SELECT coursename FROM course where coursename like  '%$q%' ");
$result2=mysqli_query($conn,"SELECT username FROM user where username like  '%$q%' ");
$result3=mysqli_query($conn,"SELECT roomname FROM classroom where roomname like  '%$q%' ");

$rows=mysqli_num_rows($result1);
if ($rows> 0)
{
    while($row = mysqli_fetch_assoc($result1))
    {
        echo "<p><a href='#' class='leftborder'><b>".$row['coursename']."</b></a></p>";
    }

}
else
{


    $rows1=mysqli_num_rows($result2);
    if ($rows1> 0)
    {
        while($row = mysqli_fetch_assoc($result2))
        {
            echo "<p><a href='#' class='leftborder'><b>".$row['username']."</b></a></p>";
        }

    }
    else
    {


        $rows2=mysqli_num_rows($result3);
        if ($rows2> 0)
        {
            while($row = mysqli_fetch_assoc($result3))
            {
                echo "<p><a href='#' class='leftborder'><b>".$row['roomname']."</b></a></p>";
            }

        }
        else
        {
            echo "No news found according to this search term";
        }
    }
}
?>