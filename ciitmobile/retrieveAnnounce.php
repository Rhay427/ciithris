<?php

if($_SERVER['REQUEST_METHOD']=='GET'){
    require_once 'conn.php';
    $sql = "SELECT * FROM announcements WHERE state = 1 ORDER BY datestamp DESC";
    $result = array();
    $result['data'] = array();
    $response = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($response)){
        $index['author'] = $row['1'];
        $index['title'] = $row['2'];
        $index['description'] = $row['3'];
        $index['datestamp'] = $row['4'];

        array_push($result['data'], $index);
    }
    $result['success'] = "1";
    echo json_encode($result);
    mysqli_close($con);
}

?>