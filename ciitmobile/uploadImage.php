<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST["username"];
    $photo = $_POST["photo"];
    $path = "prof_img/$username.jpeg";
    $finalPath = "http://rhaysabaria-001-site2.ftempurl.com/ciitmobile/".$path;
    require_once "conn.php";
    $sql = "UPDATE emp_user SET profImage = '$finalPath' WHERE username = '$username'";
    if(mysqli_query($con,$sql)){
        if(file_put_contents($path,base64_decode($photo))){
            $result['success'] = "1";
            $result['message'] = "success";
            
            echo json_encode($result);
            mysqli_close($con);
        }
    }

}

?>