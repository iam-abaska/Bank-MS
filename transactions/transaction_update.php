<?php
include('../includes/connection.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    /*selecting data from database table,so that we can display in input fields*/
    $select_query="Select * from `transactions` where TransactionID=$uid";
    $result_query=mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $account=$row['AccountID'];
    $type=$row['TransactionType'];
    $amount=$row['Amount'];
    $date=$row['TransactionDate'];
    $Description=$row['Description'];
    if(isset($_POST['update'])){
      $account_update=$_POST['account'];
      $type_update=$_POST['type'];
      $amount_update=$_POST['amount'];
      $Description_update=$_POST['description'];

      /* updating new data inside database table*/
      $update_query="UPDATE `transactions` SET `TransactionType`='$type_update',`Amount`='$amount_update',`Description`='$Description_update'  where TransactionID=$uid";
      $result_query=mysqli_query($conn,$update_query);
      if($result_query){
          echo "<script>alert('Data updated successfully')</script>";
          echo "<script>window.open('transaction_data.php','_self')</script>";
      }else{
          die(mysqli_error($conn));
      }
  }

}
$sql = "SELECT accounts.CustomerID,' ',customers.FullName from accounts,customers WHERE accounts.CustomerID=customers.CustomerID";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Data in PHP</title>
    <link rel="stylesheet" href="transaction.css" />
  </head>
  <body>
    <div class="form_container">
      <form action='' method='post'>
        <h2>Transactions Table Data</h2>
        <label for="account">Select Account:</label>
            <select id="account" name="account" required>
                <option value="" disabled selected>Select Account</option>
                <?php
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      // Mark the correct option as selected
                      $selected = ($row['AccountID'] == $customer) ? 'selected' : '';
                      echo "<option value='" . $row['AccountID'] . "' $selected>" . $row['FullName'] . "</option>";
                  }
              }  else {
                    echo "<option value='' disabled>No Customers Available</option>";
                }
                ?>
            </select>
            

            <label for="type">Select Transaction Type:</label>
            <select id="type" name="type" required>
            <option value="" disabled selected>Select Transaction Type</option>
            <option value="Deposit" <?php echo ($type == "Deposit") ? "selected" : ""; ?>>Deposit</option>
            <option value="Withdrawal" <?php echo ($type == "Withdrawal") ? "selected" : ""; ?>>Withdrawal</option>
            <option value="Transfer" <?php echo ($type == "Transfer") ? "selected" : ""; ?>>Transfer</option>
            <option value="Payment" <?php echo ($type == "Payment") ? "selected" : ""; ?>>Payment</option>
            </select>


            <label for="amount">Transaction Amount:</label>
            <input type="text" id="amount" name="amount" value="<?php echo $amount ?>">


            <label for="describtion">Transaction Description:</label>
            <input type="text" id="describtion" name="description" value="<?php echo $Description ?>">
            

          
          <button type="submit" class="submit_btn" name="update">Update</button>
          
      </form>
    </div>