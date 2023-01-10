<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    require_once 'conn.php';
    $sql = "SELECT * FROM payroll_tbl WHERE state = 1 AND empid = '$empid' ORDER BY datecreated DESC";
    $result = array();
    $result['data'] = array();
    $response = mysqli_query($con,$sql);
    if(mysqli_query($con,$sql)){
        while($row = mysqli_fetch_array($response)){
            $index['id'] = $row['0'];
            $index['empid'] = $row['1'];
            $index['fullName'] = $row['2'];
            $index['branch'] = $row['3'];
            $index['department'] = $row['4'];
            $index['designation'] = $row['5'];
            $index['b_salary'] = $row['6'];
            $index['range_start'] = $row['7'];
            $index['range_end'] = $row['8'];
            $index['hours_total'] = $row['9'];
            $index['leave_total'] = $row['10'];
            $index['tax'] = $row['11'];
            $index['sss'] = $row['12'];
            $index['philhealth'] = $row['13'];
            $index['pag_ibig'] = $row['14'];
            $index['leave_deduct'] = $row['15'];
            $index['other_deduct'] = $row['16'];
            $index['total_pay'] = $row['17'];
            $index['datecreated'] = $row['18'];
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