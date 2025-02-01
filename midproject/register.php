<?php
include_once('conn.php');

if(isset($_POST['register']))
{
    $username=$_POST['username'];
    $pass=md5($_POST['password']);

    $sql   ="INSERT INTO `user`(`username`, `password`) VALUES ('$username','$pass')";
    $result=mysqli_query($conn,$sql);
    if($result){ 
    header('location:index.php');
    echo"<script>alert('New User Register Success');</script>";   
    }else{
        die(mysqli_error($conn));
    }
   
}