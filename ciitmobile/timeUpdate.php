<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $timeOut = $_POST['timeOut'];
    $hours = $_POST['hours'];
    $int_hours = $_POST['int_hours'];
    $int_minutes = $_POST['int_minutes'];

    require_once 'conn.php';
    $sql = "UPDATE time_attendance SET timeOut = '$timeOut', hours = '$hours', int_hours = '$int_hours', int_minutes = '$int_minutes'
    WHERE id = '$id'";
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