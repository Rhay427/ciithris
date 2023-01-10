<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    
    require_once 'conn.php';
    $sql = "UPDATE emp_user SET edit_auth = '2'
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