<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$account = $_POST['account'];
   	$type = $_POST['type'];
   	$amount =$_POST['amount'];
    $describtion =$_POST['describtion'];
   	$insert = "INSERT INTO `transactions`(`AccountID`, `TransactionType`, `Amount`, `Description`) VALUES ('$account','$type','$amount','$describtion')";
   	$result = mysqli_query($conn, $insert);
   if($result){
    echo "<script>alert('Data Inserted Successfully!')</script>";
   }
   else{
   	 echo "failed!";
    }
}
$sql = "SELECT accounts.CustomerID,' ',customers.FullName from accounts,customers WHERE accounts.CustomerID=customers.CustomerID";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions Table</title>
    <link rel="stylesheet" href="transaction.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Transactions Table</h2>

            <label for="loan">Select Account:</label>
            <select id="loan" name="account" required>
                <option value="" disabled selected>Select Account</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['LoanID'] . "'>" . $row['FullName'] . "</option>";
                    }
                } else {
                    echo "<option value='' disabled>No Customers Available</option>";
                }
                ?>
            </select>
            

            <label for="type">Select Transaction Type:</label>
            <select id="type" name="type" required>
            <option value="" disabled selected>Select Transaction Type</option>
            <option value="Deposit">Deposit</option>
            <option value="Withdrawal">Withdrawal</option>
            <option value="Transfer">Transfer</option>
            <option value="Payment">Payment</option>
            </select>


            <label for="amount">Transaction Amount:</label>
            <input type="text" id="amount" name="amount" placeholder="Enter Transaction Amount" required>


            <label for="describtion">Transaction Description:</label>
            <input type="text" id="describtion" name="describtion" placeholder="Enter Transaction Description" required>
            
            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="transaction_data.php" class="show_btn">Show Employee Data</a>
            </div>
        </form>
    </div>
</body>
</html>
