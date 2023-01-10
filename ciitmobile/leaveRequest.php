<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $start = $_POST['startDate'];
    $end = $_POST['endDate'];
    $total = $_POST['total'];
    $reason = $_POST['reason'];
    $status = $_POST['status'];
    
    require_once 'conn.php';
    $sql = "INSERT INTO leave_requests (empid, fullname, email, startDate, endDate, totalDays, 
    reason, status, state)
    VALUES ('$empid', '$name', '$email', '$start', '$end', '$total', '$reason', '$status', '1')";
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