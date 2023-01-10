<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    require_once 'conn.php';
    $sql = "SELECT * FROM leave_credits WHERE empid ='$empid'";
    $response = mysqli_query($con,$sql);
    $result = array();
    $result['read'] = array();
    if( mysqli_num_rows($response)===1){
        if($row = mysqli_fetch_assoc($response)){
            $res['credits'] = $row['credits'];
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