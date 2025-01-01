<?php
include('../includes/connection.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    /*selecting data from database table,so that we can display in input fields*/
    $select_query="Select * from `customers` where CustomerID=$uid";
    $result_query=mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $name=$row['FullName'];
    $date=$row['DateOfBirth'];
    $address=$row['Address'];
    $phone=$row['Phone'];
    $email=$row['Email'];
    if(isset($_POST['update'])){
      $name_update=$_POST['name'];
      $date_update=$_POST['date'];
      $address_update=$_POST['address'];
      $phone_update=$_POST['phone'];
      //echo $phone_update;
      $email_update=$_POST['email'];

      /* updating new data inside database table*/
      $update_query="UPDATE `customers` SET `FullName`='$name_update',`DateOfBirth`='$date',`Address`='$address_update',`Phone`='$phone_update',`Email`='$email_update' where CustomerID=$uid";
      $result_query=mysqli_query($conn,$update_query);
      if($result_query){
          echo "<script>alert('Data updated successfully')</script>";
          echo "<script>window.open('customers_data.php','_self')</script>";
      }else{
          die(mysqli_error($conn));
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
    <link rel="stylesheet" href="customers.css" />
  </head>
  <body>
    <div class="form_container">
      <form action='' method='post'>
        <h2>Branches Table Data</h2>
        <label for="name">Customer Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name ?>">

            <label for="date">Customer Date of Birth:</label>
            <input type="date" id="date" name="date" value="<?php echo $date ?>">
            
            <label for="address">Customer Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $address ?>">
            
            <label for="phone">Customer Contact No:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $phone ?>">
            
            
            <label for="email">Customer Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email ?>">

          
          <button type="submit" class="submit_btn" name="update">Update</button>
          
      </form>
    </div>