<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an User</title>
</head>
<body>
        
    <div >
        <form  method="post">
                <div >
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Please Enter Your Name">
                </div>

                <div >
                        <label >Email</label>
                        <input type="email" name="email"  placeholder="Please Enter Your Email">
                </div>

                <div >
                        <label>Mobile</label>
                        <input name="phone"  placeholder="Please Enter Your phone Number">
                </div>
                <div>
                        <label >Password</label>
                        <input type="password" name="password" placeholder="Please Enter Your Password">
                </div>

                <button type="submit" name="submit" >Submit</button>
         </form>
    </div>

<?php
    include './utils/dbConnection.php';
    session_start();

    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $sql="insert into user (name,email,phone,password)
        values('$name','$email','$phone','$password')";

        $result=mysqli_query($conn, $sql);

        if($result){
            $_SESSION['status']="Data Inserted Successfully";
                header('location:users.php');
            }
        else{
            die(mysqli_error($conn));
        }
    }

?>

</body>
</html>