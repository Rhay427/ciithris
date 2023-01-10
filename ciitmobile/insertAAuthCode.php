<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $key = $_POST['key'];
    
    require_once 'conn.php';
    $sql = "UPDATE emp_user SET is_aauth = '$key'
    WHERE aemail = '$email'";
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