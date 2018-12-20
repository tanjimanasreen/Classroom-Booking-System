<?php

require_once("connect.php");

function isUniqueEmail($email){

    $sql = "SELECT * FROM user WHERE email = '$email'";

    $result=execute($sql);
    $res=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);

    if($count!=0){
        return false;
    }else{
        return true;
    }
}

function isUniqueId($id){

    $sql = "SELECT * FROM user WHERE username = '$id'";
    $result = execute($sql);
    $res=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);

    if($count!=0){
        return false;
    }else{
        return true;
    }
}

function isUniqueDept($dept){

    $sql = "SELECT * FROM department WHERE deptname = '$dept'";
    $result = execute($sql);
    $res=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);

    if($count!=0){
        return false;
    }else{
        return true;
    }
}

function isUniqueRoom($room){

    $sql = "SELECT * FROM classroom WHERE roomname = '$room'";
    $result = execute($sql);
    $res=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);

    if($count!=0){
        return false;
    }else{
        return true;
    }
}

function isUniqueCourse($course){

    $sql = "SELECT * FROM course WHERE coursename = '$course'";
    $result = execute($sql);
    $res=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);

    if($count!=0){
        return false;
    }else{
        return true;
    }
}


function getDepartmentId($dept){

    $sql = "SELECT id FROM department WHERE deptname = '$dept'";
    $result = execute($sql);
    $res= mysqli_fetch_array($result);

    return $res;
}

function addUser($id, $name, $email, $phone, $password, $deptid)
{
    $sql = "INSERT INTO user(username, fullname, email, password, phone, status, deptid) VALUES ('$id', '$name', '$email', '$password', '$phone', '0', '$deptid')";
    $result = execute($sql);

    if($result==true){
        return true;
    }else{

        return false;
    }
}

function checkUser($id, $password){

    $sql = "SELECT * FROM user WHERE username ='$id' AND password = '$password'";
    $result = execute($sql);
    $count = mysqli_num_rows($result);

    if($count===0){
        return false;
    }else{

        return true;
    }
}

function getUserType($id, $password){

    $sql = "SELECT * FROM user WHERE username ='$id' AND password = '$password'";
    $result = execute($sql);
    $res= mysqli_fetch_array($result);

    return $res;

}

function addDepartment($deptname){

    $sql = "INSERT INTO department(deptname) VALUES('$deptname')";
    $result = execute($sql);

    if($result==true){

        return true;
    }else{

        return false;
    }
}

function addCourse($course, $deptId){

    $sql = "INSERT INTO course(coursename, deptid) VALUES('$course' , '$deptId')";
    $result = execute($sql);

    if($result==true){

        return true;
    }else{

        return false;
    }
}

function getDeptList(){

    $sql = "SELECT * From department";
    $result = execute($sql);

    $deptList = array();

    for($i =0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $deptList[$i] = $row;
    }

    return $deptList;
}

function getUser($username){

    $sql = "SELECT * From user WHERE username = '$username'";
    $result = execute($sql);

    $user = mysqli_fetch_array($result);

    return $user;

}

function getCourseList($deptId){

    $sql = "SELECT coursename FROM course WHERE deptid = '$deptId'";

    $result = execute($sql);
    $courseList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $courseList[$i] = $row;
    }

    return $courseList;
}

function checkClassRoom($date, $startTime, $endTime){

    $sql = "SELECT classid FROM booking WHERE date ='$date' AND starttime = '$startTime' AND endtime = '$endTime' AND status ='1'";


    $result = execute($sql);

    $classList = mysqli_fetch_array($result);

    return $classList;
}

function checkStartTime($date, $startTime){

    $sql = "SELECT * FROM booking WHERE date ='$date' AND starttime = '$startTime' AND status ='1'";

    $result = execute($sql);

    $classList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $classList[$i] = $row;
    }


    return $classList;
}

function getClassRoom($roomType){

    $sql = "SELECT * FROM classroom WHERE typeid = '$roomType'";

    $result = execute($sql);
    $roomList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $roomList[$i] = $row;
    }

    return $roomList;

}

function getClassId($roomName){

    $sql = "SELECT * From classroom WHERE roomname = '$roomName'";
    $result = execute($sql);

    $room = mysqli_fetch_array($result);

    return $room;
}

function getCourseId($courseName){

    $sql = "SELECT * From course WHERE coursename = '$courseName'";
    $result = execute($sql);
    $course = mysqli_fetch_array($result);

    return $course;
}

function addNewBooking($userId, $courseId, $classId, $day, $startTime, $endTime, $addedBy){

    $sql = "INSERT INTO booking(userid, classid, courseid, status, date, description, starttime, endtime, addedby) VALUES ('$userId', '$classId', '$courseId', '1', '$day', 'Booked' ,'$startTime' ,'$endTime','$addedBy')";
    $result = execute($sql);

    if($result==true){

        return true;
    }else{

        return false;
    }

}

function getFacultyBookingInfo($userId){

    $sql = "SELECT * FROM booking WHERE userid = '$userId'";

    $result = execute($sql);
    $bookList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $bookList[$i] = $row;
    }

    return $bookList;

}


function getClassRoomName($classId){

    $sql = "SELECT roomname FROM classroom WHERE id = '$classId'";
    $result = execute($sql);

    $roomName = mysqli_fetch_array($result);

    return $roomName;

}

function getCourseName($courseId){

    $sql = "SELECT coursename FROM course WHERE id = '$courseId'";
    $result = execute($sql);

    $courseName = mysqli_fetch_array($result);

    return $courseName;
}

function cancelBookingStatus($bookId, $reason, $cancelledBy){

    $sql = "UPDATE booking SET status = 0 WHERE id = '$bookId'";
    $sql2 = "UPDATE booking SET description ='$reason' WHERE id = '$bookId'";
    $sql3 = "UPDATE booking SET cancelledby ='$cancelledBy' WHERE id = '$bookId'";


    $result = execute($sql);
    $result2 = execute($sql2);
    $result3 = execute($sql3);

    if($result == 1 && $result2 == 1 && $result3 == 1){

        return true;
    }else{

        return false;
    }
}

function getBookingDetails($bookId){

    $sql ="SELECT * FROM booking WHERE id ='$bookId'";

    $result = execute($sql);

    $bookDetails = mysqli_fetch_array($result);
    return $bookDetails;
}



function getAllCourse(){

    $sql = "SELECT * FROM course";
    $result = execute($sql);

    $courseList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $courseList[$i] = $row;
    }

    return $courseList;

}

function getAllUserRequest(){

    $sql = "SELECT * FROM user WHERE status = 0 AND type = 2";
    $result = execute($sql);

    $userList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $userList[$i] = $row;
    }

    return $userList;


}

function confirmUser($userId){

    $sql = "UPDATE user SET status = 1 WHERE id = '$userId'";

    $result = execute($sql);

    if($result == 1){

        return true;
    }else{

        return false;
    }
}

function cancelUser($userId){

    $sql = "UPDATE user SET status = NULL WHERE id = '$userId'";

    $result = execute($sql);

    if($result == 1){

        return true;
    }else{

        return false;
    }
}

function getFacultyDept($deptId){

    $sql ="SELECT * FROM department WHERE id ='$deptId'";

    $result = execute($sql);

    $deptName = mysqli_fetch_array($result);
    return $deptName;
}

function getALLBooking(){

    $sql = "SELECT * FROM booking";

    $result = execute($sql);

    $bookList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $bookList[$i] = $row;
    }

    return $bookList;

}

function getUsersName($userId){
    $sql ="SELECT * FROM user WHERE id ='$userId'";

    $result = execute($sql);

    $userName = mysqli_fetch_array($result);
    return $userName;

}

function getAllRoom(){

    $sql = "SELECT * FROM classroom";
    $result = execute($sql);

    $roomList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $roomList[$i] = $row;
    }

    return $roomList;
}

function getRoomType($typeId){

    $sql = "SELECT * FROM roomtype WHERE id ='$typeId'";
    $result = execute($sql);

    $typeName = mysqli_fetch_array($result);
    return $typeName;

}

function getRoomLocation($annexId){

    $sql = "SELECT * FROM annex WHERE id ='$annexId'";
    $result = execute($sql);

    $locationName = mysqli_fetch_array($result);
    return $locationName;

}

function getAllRoomType(){

    $sql = "SELECT * FROM roomtype";
    $result = execute($sql);

    $typeList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $typeList[$i] = $row;
    }

    return $typeList;

}

function getAllRoomLocation(){

    $sql = "SELECT * FROM annex";
    $result = execute($sql);

    $annexList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $annexList[$i] = $row;
    }

    return $annexList;

}

function getRoomTypeId($type){

    $sql = "SELECT * FROM roomtype WHERE typename = '$type'";

    $result = execute($sql);

    $typeId = mysqli_fetch_array($result);
    return $typeId;

}

function getRoomLocationId($location){

    $sql = "SELECT * FROM annex WHERE name = '$location'";

    $result = execute($sql);

    $locationId = mysqli_fetch_array($result);
    return $locationId;

}

function addingRoom($room, $typeid, $annexid){

    $sql = "INSERT INTO classroom(roomname, typeid, annexid) VALUES ('$room', '$typeid', '$annexid')";
    $result = execute($sql);

    if($result==true){

        return true;
    }else{

        return false;
    }
}

function getAllBookingDetailsPaginationModel($offset, $no_of_records_per_page){
    $sql= "select * from booking LIMIT $offset, $no_of_records_per_page";

    $result = execute($sql);

    $bookList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $bookList[$i] = $row;
    }

    return $bookList;
}
function getAllFaculty(){

    $sql = "SELECT * FROM user WHERE status = 1 AND type = 2";
    $result = execute($sql);

    $facultyList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $facultyList[$i] = $row;
    }

    return $facultyList;
}
function getFacultyPaginationModel($offset, $no_of_records_per_page){
    $sql= "select * from user LIMIT $offset, $no_of_records_per_page";

    $result = execute($sql);

    $facultyList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $facultyList[$i] = $row;
    }

    return $facultyList;
}
function getUserRequestPaginationModel($offset, $no_of_records_per_page){
    $sql= "select * from user where status=0  LIMIT $offset, $no_of_records_per_page";
    $result = execute($sql);

    $userList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $userList[$i] = $row;
    }

    return $userList;

}


?>