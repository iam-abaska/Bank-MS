<?php
include('../includes/connection.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    /*selecting data from database table,so that we can display in input fields*/
    $select_query="Select * from `loanrepayments` where RepaymentID=$uid";
    $result_query=mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $loan=$row['LoanID'];
    $date=$row['RepaymentDate'];
    $amount=$row['RepaymentAmount'];
    $balance=$row['RemainingBalance'];
    if(isset($_POST['update'])){
      $loan_update=$_POST['loan'];
      $date_update=$_POST['date'];
      $amount_update=$_POST['amount'];
      //echo $phone_update;
      $balance_update=$_POST['balance'];

      /* updating new data inside database table*/
      $update_query="UPDATE `loanrepayments` SET `LoanID`='$loan_update',`RepaymentDate`='$date_update',`RepaymentAmount`='$amount_update',`RemainingBalance`='$balance_update' where RepaymentID=$uid";
      $result_query=mysqli_query($conn,$update_query);
      if($result_query){
          echo "<script>alert('Data updated successfully')</script>";
          echo "<script>window.open('loans_pay_data.php','_self')</script>";
      }else{
          die(mysqli_error($conn));
      }
  }

}
$sql = "SELECT loans.LoanID,' ',customers.FullName from loans,customers WHERE loans.CustomerID=customers.CustomerID";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Data in PHP</title>
    <link rel="stylesheet" href="loans_pay.css" />
  </head>
  <body>
    <div class="form_container">
      <form action='' method='post'>
        <h2>Branches Table Data</h2>
        <label for="loan">Select Loan:</label>
            <select id="loan" name="loan" required>
                <option value="" disabled selected>Select Loan</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $selected = ($row['LoanID'] == $loan) ? 'selected' : '';
                      echo "<option value='" . $row['LoanID'] . "' $selected>" . $row['FullName'] . "</option>";
                    }
                } else {
                    echo "<option value='' disabled>No Customers Available</option>";
                }
                ?>
            </select>
            

            <label for="name">Repayment Date:</label>
            <input type="date" id="amount" name="date" value="<?php echo $date?>" >


            <label for="name">Repayment Amount:</label>
            <input type="text" id="amount" name="amount" value="<?php  echo $amount ?>" >


            <label for="name">Remaining Balance:</label>
            <input type="text" id="balance" name="balance" value="<?php  echo $balance ?>" >

          
          <button type="submit" class="submit_btn" name="update">Update</button>
          
      </form>
    </div>