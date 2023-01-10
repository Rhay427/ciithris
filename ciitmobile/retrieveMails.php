<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    require_once 'conn.php';
    $sql = "SELECT * FROM mail_tbl WHERE state = 1 AND empid = '$empid' ORDER BY datestamp DESC";
    $result = array();
    $result['data'] = array();
    $response = mysqli_query($con,$sql);
    if(mysqli_query($con,$sql)){
        while($row = mysqli_fetch_array($response)){
            $index['id'] = $row['0'];
            $index['fullname'] = $row['2'];
            $index['email'] = $row['3'];
            $index['title'] = $row['4'];
            $index['message'] = $row['5'];
            $index['response'] = $row['6'];
            $index['datestamp'] = $row['7'];
            $index['status'] = $row['8'];

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