<?php
session_start();
include './utils/dbConnection.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from user where id=$id";

    $result=mysqli_query($conn,$sql);

    if($result){
        $_SESSION['status']="Data Deleted Successfully";
       header('location:users.php');

    }
    else{
        die(mysqli_error($con));
    }
}
?>