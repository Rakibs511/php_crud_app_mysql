<?php
    $conn = new mysqli('localhost','root','','phpcrud');
    if(!$conn){
        die(mysqli_error($conn));
    }
?>