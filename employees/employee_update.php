<?php
include('../includes/connection.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    /*selecting data from database table,so that we can display in input fields*/
    $select_query="Select * from `employees` where EmployeeID=$uid";
    $result_query=mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $name=$row['FullName'];
    $position=$row['Position'];
    $branch=$row['BranchID'];
    $phone=$row['Phone'];
    $email=$row['Email'];
    if(isset($_POST['update'])){
      $name_update=$_POST['name'];
      $position_update=$_POST['position'];
      $branch_update=$_POST['branch'];
      $phone_update=$_POST['phone'];
      $email_update=$_POST['email'];
      
      //echo $phone_update;
      

      /* updating new data inside database table*/
      $update_query="UPDATE `employees` SET `FullName`='$name_update',`Position`='$position_update',`BranchID`='$branch_update',`Phone`='$phone_update',`Email`='$email_update' where EmployeeID=$uid";
      $result_query=mysqli_query($conn,$update_query);
      if($result_query){
          echo "<script>alert('Data updated successfully')</script>";
          echo "<script>window.open('employee_data.php','_self')</script>";
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
    <link rel="stylesheet" href="employee.css" />
  </head>
  <body>
    <div class="form_container">
      <form action='' method='post'>
        <h2>Branches Table Data</h2>
          <label for="name">Employee Name:</label>
          <input type="text" name="name" value="<?php echo $name ?>"/>

          <label for="place">Employee Position:</label>
          <input type="text" name="position"  value="<?php echo $position ?>"/>

          <label for="branch">Employee Branch:</label>
          <input type="text" name="branch"  value="<?php echo $branch ?>"/>

          <label for="phone">Employee Contact No:</label>
          <input type="text" name="phone" value="<?php echo $phone ?>"/>
          
          <label for="email">Employee Email:</label>
          <input type="email" name="email" value="<?php echo $email ?>"/>

          

          
          <button type="submit" class="submit_btn" name="update">Update</button>
          
      </form>
    </div>