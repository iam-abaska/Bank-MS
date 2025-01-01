<?php
include('../includes/connection.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    /*selecting data from database table,so that we can display in input fields*/
    $select_query="Select * from `branches` where BranchID=$uid";
    $result_query=mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $name=$row['BranchName'];
    $address=$row['Address'];
    $phone=$row['Phone'];
    $email=$row['Email'];
    if(isset($_POST['update'])){
      $name_update=$_POST['name'];
      $address_update=$_POST['address'];
      $phone_update=$_POST['phone'];
      //echo $phone_update;
      $email_update=$_POST['email'];

      /* updating new data inside database table*/
      $update_query="UPDATE `branches` SET `BranchName`='$name_update',`Address`='$address_update',`Phone`='$phone_update',`Email`='$email_update' where BranchID=$uid";
      $result_query=mysqli_query($conn,$update_query);
      if($result_query){
          echo "<script>alert('Data updated successfully')</script>";
          echo "<script>window.open('branches_data.php','_self')</script>";
      }else{
          die(mysqli_error($con));
      }
  }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Data in PHP</title>
    <link rel="stylesheet" href="branches.css" />
  </head>
  <body>
    <div class="form_container">
      <form action='' method='post'>
        <h2>Branches Table Data</h2>
          <label for="name">Branch Name:</label>
          <input type="text" name="name" value="<?php echo $name ?>"/>

          <label for="place">Branch Address:</label>
          <input type="text" name="address"  value="<?php echo $address ?>"/>

          <label for="email">Branch Email:</label>
          <input type="email" name="email" value="<?php echo $email ?>"/>

          <label for="phone">Branch Contact No:</label>
          <input type="text" name="phone" value="<?php echo $phone ?>"/>

          
          <button type="submit" class="submit_btn" name="update">Update</button>
          
      </form>
    </div>