<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $reason = $_POST['reason'];
    $state = $_POST['state'];
    
    require_once 'conn.php';
    $sql = "INSERT INTO resignation_requests (empid, fullname, email, department, reason, state)
    VALUES ('$empid', '$name', '$email', '$dept', '$reason', '1')";
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