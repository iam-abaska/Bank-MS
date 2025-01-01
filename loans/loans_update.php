<?php
include('../includes/connection.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    /*selecting data from database table,so that we can display in input fields*/
    $select_query="Select * from `loans` where LoanID=$uid";
    $result_query=mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $customer=$row['CustomerID'];
    $type=$row['LoanType'];
    $amount=$row['LoanAmount'];
    $start=$row['LoanStartDate'];
    $date=$row['LoanEndDate'];
    $status=$row['LoanStatus'];
    if(isset($_POST['update'])){
      $customer_update=$_POST['customer'];
      $type_update=$_POST['type'];
      $amount_update=$_POST['amount'];
      $start_update=$_POST['start'];
      $end_update=$_POST['end'];
      //echo $phone_update;
      $status_update=$_POST['status'];

      /* updating new data inside database table*/
      $update_query="UPDATE `loans` SET `CustomerID`='$customer_update',`LoanType`='$type_update',`LoanAmount`='$amount_update',`LoanStartDate`='$start_update',`LoanEndDate`='$end_update',`LoanStatus`='$status_update' where LoanID=$uid";
      $result_query=mysqli_query($conn,$update_query);
      if($result_query){
          echo "<script>alert('Data updated successfully')</script>";
          echo "<script>window.open('loans_data.php','_self')</script>";
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
    <link rel="stylesheet" href="loans.css" />
  </head>
  <body>
    <div class="form_container">
      <form action='' method='post'>
        <h2>Loans Table Data</h2>
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
            
            <label for="type">Select Loan Type:</label>
            <select id="type" name="type" required>
            <option value="" disabled selected>Select Loan Type</option>
            <option value="Personal Loan" <?php echo ($type == "Personal Loan") ? "selected" : ""; ?> >Personal Loan</option>
            <option value="Home Loan" <?php echo ($type == "Home Loan") ? "selected" : ""; ?>>Home Loan</option>
            <option value="Car Loan" <?php echo ($type == "Car Loan") ? "selected" : ""; ?>>Car Loan</option>
            <option value="Business Loan" <?php echo ($type == "Business Loan") ? "selected" : ""; ?>>Business Loan</option>
            <option value="Student Loan" <?php echo ($type == "Student Loan") ? "selected" : ""; ?>>Student Loan</option>
            </select>


            <label for="amount">Loan Amount:</label>
            <input type="text" id="amount" name="amount" value="<?php echo $amount ?>">


            <label for="start">Start Date:</label>
            <input type="date" id="start" name="start" value="<?php echo $start ?>">


            <label for="end">End Date:</label>
            <input type="date" id="end" name="end" value="<?php echo $date ?>">
                    
            <label for="status">Select Loan Status:</label>
            <select id="status" name="status" required>
            <option value="" disabled selected>Select Loan Type</option>
            <option value="Pendding" <?php echo ($status == "Pendding") ? "selected" : ""; ?> >Pendding</option>
            <option value="Approved" <?php echo ($status == "Approved") ? "selected" : ""; ?> >Approved</option>
            <option value="Disbursed" <?php echo ($status == "Disbursed") ? "selected" : ""; ?> >Disbursed</option>
            <option value="Overdue" <?php echo ($status == "Overdue") ? "selected" : ""; ?> >Overdue</option>
            <option value="Completed" <?php echo ($status == "Completed") ? "selected" : ""; ?> >Completed</option>
            </select>

          
          <button type="submit" class="submit_btn" name="update">Update</button>
          
      </form>
    </div>