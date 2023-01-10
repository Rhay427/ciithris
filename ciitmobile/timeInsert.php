<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    $fullname = $_POST['fullname'];
    $timeIn = $_POST['timeIn'];
    $timeOut = $_POST['timeOut'];
    $dateStamp = $_POST['dateStamp'];
    $hours = $_POST['hours'];
    $state = $_POST['state'];
    $int_hours = $_POST['int_hours'];
    $int_minutes = $_POST['int_minutes'];

    require_once 'conn.php';
    $sql = "INSERT INTO time_attendance (empid,fullname,timeIn,timeOut,hours,dateStamp,state,int_hours,int_minutes)
    VALUES ('$empid', '$fullname', '$timeIn', '$timeOut', '$hours', '$dateStamp', '$state', '$int_hours', '$int_minutes')";
    if(mysqli_query($con,$sql)){
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($con);
    }else{
        $result["success"] = "0";
        $result["message"] = "error!";

        echo json_encode($result);
        mysqli_close($con);
    }
}

?>