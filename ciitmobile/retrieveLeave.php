<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    require_once 'conn.php';
    $sql = "SELECT * FROM leave_requests WHERE state = 1 AND empid = '$empid' 
    ORDER BY datestamp DESC";
    $result = array();
    $result['data'] = array();
    $response = mysqli_query($con,$sql);
    if(mysqli_query($con,$sql)){
        while($row = mysqli_fetch_array($response)){
            $index['id'] = $row['0'];
            $index['email'] = $row['3'];
            $index['startdate'] = $row['4'];
            $index['enddate'] = $row['5'];
            $index['total'] = $row['6'];
            $index['reason'] = $row['7'];
            $index['status'] = $row['8'];
            $index['datestamp'] = $row['9'];
            $index['remarks'] = $row['11'];

            array_push($result['data'], $index);
        }
        $result['success'] = "1";
        echo json_encode($result);
        mysqli_close($con);
    }else{
        $result['success'] = "0";
        echo json_encode($result);
        mysqli_close($con);
    }
}
?>