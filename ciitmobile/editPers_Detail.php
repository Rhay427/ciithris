<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    $fullname = $_POST['fullname'];
    $acontact = $_POST['altcontact'];
    $mcontact = $_POST['maincontact'];
    $marital = $_POST['marital'];
    $dateofBirth = $_POST['dateofbirth'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $present = $_POST['present'];
    $permanent = $_POST['permanent'];
    require_once 'conn.php';
    $sql = "UPDATE emp_user SET fullname = '$fullname', 
    acontact = '$acontact', mcontact ='$mcontact', 
    mstatus = '$marital', birthdate = '$dateofBirth', 
    religion ='$religion', nationality = '$nationality', 
    present = '$present', permanent = '$permanent' WHERE empid ='$empid'";

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