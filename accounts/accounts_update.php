<?php
include('../includes/connection.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    /*selecting data from database table,so that we can display in input fields*/
    $select_query="Select * from `accounts` where AccountID=$uid";
    $result_query=mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $customer=$row['CustomerID'];
    $type=$row['AccountType'];
    $balance=$row['Balance'];
    $status=$row['AccountStatus'];
    $date=$row['DateCreated'];
    if(isset($_POST['update'])){
      $customer_update=$_POST['customer'];
      $type_update=$_POST['type'];
      $balance_update=$_POST['balance'];
      $status_update=$_POST['status'];
      //echo $phone_update;

      /* updating new data inside database table*/
      $update_query="UPDATE `accounts` SET `CustomerID`='$customer_update',`AccountType`='$type_update',`Balance`='$balance_update',`AccountStatus`='$status_update' where AccountID=$uid";
      $result_query=mysqli_query($conn,$update_query);
      if($result_query){
          echo "<script>alert('Data updated successfully')</script>";
          echo "<script>window.open('accounts_data.php','_self')</script>";
      }else{
          die(mysqli_error($con));
      }
  }

}
$sql = "SELECT CustomerID,FullName FROM customers";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Data in PHP</title>
    <link rel="stylesheet" href="accounts.css" />
  </head>
  <body>
    <div class="form_container">
      <form action='' method='post'>
        <h2>Accounts Table Data</h2>
        
        <label for="customer">Select Customer:</label>
        <select id="customer" name="customer" required>
    <option value="" disabled selected>Select Customer</option>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Mark the correct option as selected
            $selected = ($row['CustomerID'] == $customer) ? 'selected' : '';
            echo "<option value='" . $row['CustomerID'] . "' $selected>" . $row['FullName'] . "</option>";
        }
    } else {
        echo "<option value='' disabled>No Customers Available</option>";
    }
    ?>
</select>
            
            <label for="type">Select Account Type:</label>
            <select id="type" name="type" required>
            <option value="" disabled selected>Select Account Type</option>
            <option value="Current Account" <?php echo ($type == "Current Account") ? "selected" : ""; ?> >Current Account</option>
            <option value="Saving Account" <?php echo ($type == "Saving Account") ? "selected" : ""; ?>>Saving Account</option>
            <option value="Fixed Deposit Account" <?php echo ($type == "Fixed Deposit Account") ? "selected" : ""; ?>>Fixed Deposit Account</option>
            <option value="Salary Account" <?php echo ($type == "Salary Account") ? "selected" : ""; ?>>Salary Account</option>
            </select>

            <label for="balance">Account Balance:</label>
            <input type="text" id="balance" name="balance" value="<?php echo $balance ?>" >         
            
            <label for="status">Select Account Status:</label>
    <select id="status" name="status" required>
        <option value="" disabled>Select Account Status</option>
        <option value="Active" <?php echo ($status == "Active") ? "selected" : ""; ?>>Active</option>
        <option value="Inactive" <?php echo ($status == "Inactive") ? "selected" : ""; ?>>Inactive</option>
        <option value="Dormant" <?php echo ($status == "Dormant") ? "selected" : ""; ?>>Dormant</option>
    </select>
          
          <button type="submit" class="submit_btn" name="update">Update</button>
          
      </form>
    </div>