<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <?php
        include './utils/dbConnection.php';
        session_start();

        $id=$_GET['editid'];

        $sql="select * from user where id=$id";

        $result=mysqli_query($conn, $sql);

        $row=mysqli_fetch_assoc($result);

        $name=$row['name'];
        $email=$row['email'];
        $phone=$row['phone'];
        $password=$row['password'];

        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $password=$_POST['password'];

            $sql="update user set name='$name', email='$email', phone='$phone', password='$password' where id='$id'";

            $result=mysqli_query($conn, $sql);

            if($result){
                $_SESSION['status']="Data Updated Successfully";
                header('location:users.php');
            }
            else{
                die(mysqli_error($con));
            }
        }
    ?>

    <div>
            <form  method="post">
            <div>
                    <label>Name</label>
                    <input type="text" name="name"placeholder="Please Enter Your Name"
                    value= <?php echo $name;?>>
            </div>

            <div>
                    <label>Email</label>
                    <input type="email" name="email"  placeholder="Please Enter Your Email" value= <?php echo $email;?>>
            </div>

            <div>
                    <label>phone</label>
                    <input type="phone" name="phone"placeholder="Please Enter Your phone Number"
                    value= <?php echo $phone;?>>
            </div>
            <div>
                    <label>Password</label>
                    <input type="text" name="password"  placeholder="Please Enter Your Password" value= <?php echo $password;?>>
            </div>

            <button type="submit" name="submit">Update</button>

        </form>
    </div>
</body>
</html>