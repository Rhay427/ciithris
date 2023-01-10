<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    require_once 'conn.php';
    $sql = "SELECT * FROM emp_user WHERE memail = '$email'";
    $response = mysqli_query($con,$sql);
    if(mysqli_num_rows($response) === 1){
        $row = mysqli_fetch_assoc($response);
        if(md5($password) === $row['password']){
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
}

?>