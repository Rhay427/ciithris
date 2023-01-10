<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    $credits = $_POST['credits'];
    
    require_once 'conn.php';
    $sql = "UPDATE leave_credits SET credits = '$credits'
    WHERE empid = '$empid'";
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