<?php
include('../includes/connection.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    /*selecting data from database table,so that we can display in input fields*/
    $select_query="Select * from `userlogin` where UserID=$uid";
    $result_query=mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $customer=$row['CustomerID'];
    $username=$row['Username'];
    $password=$row['Password'];
    if(isset($_POST['update'])){
      $customer_update=$_POST['customer'];
      $username_update=$_POST['username'];
      $password_update=$_POST['password'];
      //echo $phone_update;

      /* updating new data inside database table*/
      $update_query="UPDATE `userlogin` SET `CustomerID`='$customer_update',`Username`='$username_update',`Password`='$password_update' where UserID=$uid";
      $result_query=mysqli_query($conn,$update_query);
      if($result_query){
          echo "<script>alert('Data updated successfully')</script>";
          echo "<script>window.open('userlogin_data.php','_self')</script>";
      }else{
          die(mysqli_error($conn));
      }
  }

}
$sql = "SELECT customers.CustomerID,' ',customers.FullName FROM customers";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Data in PHP</title>
    <link rel="stylesheet" href="userlogin.css" />
  </head>
  <body>
    <div class="form_container">
      <form action='' method='post'>
        <h2>Users Table Data</h2>
        <label for="account">Select Customer:</label>
            <select id="account" name="customer" required>
                <option value="" disabled selected>Select Customer</option>
                <?php
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $selected = ($row['CustomerID'] == $customer) ? 'selected' : '';
                    echo "<option value='" . $row['CustomerID'] . "' $selected>" . $row['FullName'] . "</option>";
                  }
              } else {
                    echo "<option value='' disabled>No Customers Available</option>";
                }
                ?>
            </select>
            
                <label for="name">Username:</label>
            <input type="text" id="name" name="username" value="<?php echo $username?>">


            <label for="email">Password:</label>
            <input type="password" id="email" name="password" value="<?php echo $password?>">

          
          <button type="submit" class="submit_btn" name="update">Update</button>
          
      </form>
    </div>