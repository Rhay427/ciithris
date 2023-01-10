<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    $jobSpec = $_POST['jobSpec'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $contact = $_POST['contact'];
    $recEmail = $_POST['recEmail'];
    $spec = $_POST['spec'];
    $yearsOfExp = $_POST['yearsOfExp'];
    $currentComp = $_POST['currentComp'];
    $designation = $_POST['designation'];
    $status = $_POST['status'];
    $state = $_POST['state'];
    
    require_once 'conn.php';
    $sql = "INSERT INTO recruitment_tbl (fullName,jobSpec,gender,birthdate,contact,email,specialization,years,currentCompany,
    designation,empIDrefer,status,state)
    VALUES ('$name', '$jobSpec', '$gender', '$birthdate', '$contact', '$recEmail', '$spec', '$yearsOfExp', '$currentComp',
     '$designation', '$empid', '$status', '$state')";
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