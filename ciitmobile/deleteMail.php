<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $state = $_POST['state'];
    
    require_once 'conn.php';
    $sql = "UPDATE mail_tbl SET state = '$state' WHERE id ='$id'";
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