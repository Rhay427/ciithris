<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid = $_POST['empid'];
    $password = $_POST['password'];
    require_once 'conn.php';
    $sql = "SELECT * FROM emp_user WHERE empid = '$empid' AND state = 1";
    $response = mysqli_query($con,$sql);

    $result = array();
    $result['login'] = array();
    if(mysqli_num_rows($response) === 1){
        $row = mysqli_fetch_assoc($response);
        if(md5($password) === $row['password']){
            $index['empid'] = $row['empid'];
            $index['username'] = $row['username'];

            array_push($result['login'],$index);
            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);
            mysqli_close($con);
        }else{
            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);
            mysqli_close($con);
        }
    }
}
?>