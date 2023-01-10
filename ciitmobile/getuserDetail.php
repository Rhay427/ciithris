<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    require_once 'conn.php';
    $sql = "SELECT * FROM emp_user WHERE empid ='$empid' AND state = 1";
    $response = mysqli_query($con,$sql);
    $result = array();
    $result['read'] = array();
    if( mysqli_num_rows($response)===1){
        if($row = mysqli_fetch_assoc($response)){
            $res['username'] = $row['username'];
            $res['department'] = $row['department'];
            $res['designation'] = $row['designation'];
            $res['fullname'] = $row['fullname'];
            $res['mcontact'] = $row['mcontact'];
            $res['acontact'] = $row['acontact'];
            $res['mstatus'] = $row['mstatus'];
            $res['birthdate'] = $row['birthdate'];
            $res['religion'] = $row['religion'];
            $res['nationality'] = $row['nationality'];
            $res['present'] = $row['present'];
            $res['permanent'] = $row['permanent'];
            $res['memail'] = $row['memail'];
            $res['aemail'] = $row['aemail'];
            $res['profImage'] = $row['profImage'];
            $res['is_mauth'] = $row['is_mauth'];
            $res['is_aauth'] = $row['is_aauth'];
            $res['edit_auth'] = $row['edit_auth'];
            array_push($result["read"],$res);
            $result["success"] = "1";
            echo json_encode($result);
        }
        
    }else{
        $result["success"] = "0";
        $result["message"] = "Error!";
        echo json_encode($result);
        mysqli_close($conn);
    }
}

?>