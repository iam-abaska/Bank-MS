<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$loan = $_POST['loan'];
   	$date = $_POST['date'];
   	$amount =$_POST['amount'];
    $balance =$_POST['balance'];
   	$insert = "INSERT INTO `loanrepayments`(`LoanID`, `RepaymentDate`, `RepaymentAmount`, `RemainingBalance`) VALUES ('$loan','$date','$amount','$balance')";
   	$result = mysqli_query($conn, $insert);
   if($result){
    echo "<script>alert('Data Inserted Successfully!')</script>";
   }
   else{
   	 echo "failed!";
    }
}
$sql = "SELECT loans.LoanID,' ',customers.FullName from loans,customers WHERE loans.CustomerID=customers.CustomerID";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loans Payment Table</title>
    <link rel="stylesheet" href="loans_pay.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Branches Table</h2>

            <label for="loan">Select Loan:</label>
            <select id="loan" name="loan" required>
                <option value="" disabled selected>Select Loan</option>
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
            

            <label for="name">Repayment Date:</label>
            <input type="date" id="amount" name="date" placeholder="Enter Repayment Date" required>


            <label for="name">Repayment Amount:</label>
            <input type="text" id="amount" name="amount" placeholder="Enter Repayment Amount" required>


            <label for="name">Remaining Balance:</label>
            <input type="text" id="balance" name="balance" placeholder="Enter Remaining Amount" required>
            
            
            
            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="loans_pay_data.php" class="show_btn">Show Employee Data</a>
            </div>
        </form>
    </div>
</body>
</html>
