<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    $dateStamp = $_POST['dateStamp'];
    require_once 'conn.php';
    $sql = "SELECT * FROM time_attendance WHERE empid = '$empid' AND dateStamp = '$dateStamp' AND state = 1 ORDER BY timeIn DESC";
    $result = array();
    $result['data'] = array();
    $response = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($response)){
        $index['id'] = $row['0'];
        $index['empid'] = $row['1'];
        $index['fullname'] = $row['2'];
        $index['timeIn'] = $row['3'];
        $index['timeOut'] = $row['4'];
        $index['hours'] = $row['5'];
        $index['dateStamp'] = $row['6'];

        array_push($result['data'], $index);
    }
    $result['success'] = "1";
    echo json_encode($result);
    mysqli_close($con);
}

?>