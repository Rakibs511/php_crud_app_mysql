<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALl User</title>
</head>
<body>

<?php
    session_start();
    if (isset($_SESSION['status'])) {
        echo "<h1>".$_SESSION['status']."</h1>";
    }
    unset($_SESSION['status']);
?>

<a href="create.php">Add User</a>
<table>
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Password</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
        include './utils/dbConnection.php';
        $sql = 'select * from user';
        $result = mysqli_query($conn,$sql);
        if ($result) {
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $name=$row['name'];
                $email=$row['email'];
                $phone=$row['phone'];
                $password=$row['password'];

                echo'<tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$phone.'</td>
                    <td>'.$password.'</td>
                    <td>
                    <button><a href="edit.php?editid='.$id.'">Edit</a></button>
                    <button><a href="delete.php?deleteid='.$id.'">Delete</a></button>
                    </td>
                    </tr>';
            }
        }
    ?>
</body>
</html>