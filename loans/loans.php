<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$customer = $_POST['customer'];
   	$type = $_POST['type'];
    $amount = $_POST['amount'];
   	$start =$_POST['start'];
    $end =$_POST['end'];
    $status =$_POST['status'];
   	$insert = "INSERT INTO `loans`(`CustomerID`, `LoanType`, `LoanAmount`, `LoanStartDate`, `LoanEndDate`, `LoanStatus`) VALUES ('$customer','$type','$amount','$start','$end','$status')";
   	$result = mysqli_query($conn, $insert);
   if($result){
    echo "<script>alert('Data Inserted Successfully!')</script>";
   }
   else{
   	 echo "failed!";
    }
}
$sql = "SELECT CustomerID,FullName FROM customers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loans Table</title>
    <link rel="stylesheet" href="loans.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Loans Table</h2>

            <label for="customer">Select Customer:</label>
            <select id="customer" name="customer" required>
                <option value="" disabled selected>Select Customer</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['CustomerID'] . "'>" . $row['FullName'] . "</option>";
                    }
                } else {
                    echo "<option value='' disabled>No Customers Available</option>";
                }
                ?>
            </select>
            
            <label for="type">Select Loan Type:</label>
            <select id="type" name="type" required>
            <option value="" disabled selected>Select Loan Type</option>
            <option value="Personal Loan">Personal Loan</option>
            <option value="Home Loan">Home Loan</option>
            <option value="Car Loan">Car Loan</option>
            <option value="Business Loan">Business Loan</option>
            <option value="Student Loan">Student Loan</option>
            </select>


            <label for="amount">Loan Amount:</label>
            <input type="text" id="amount" name="amount" placeholder="Enter Loan Amount" required>


            <label for="start">Start Date:</label>
            <input type="date" id="start" name="start" placeholder="Enter Start Date" required>


            <label for="end">End Date:</label>
            <input type="date" id="end" name="end" placeholder="Enter End Date" required>
                    
            <label for="status">Select Loan Status:</label>
            <select id="status" name="status" required>
            <option value="" disabled selected>Select Loan Type</option>
            <option value="Pendding">Pendding</option>
            <option value="Approved">Approved</option>
            <option value="Disbursed">Disbursed</option>
            <option value="Overdue">Overdue</option>
            <option value="Completed">Completed</option>
            </select>
            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="loans_data.php" class="show_btn">Show Loans Data</a>
            </div>
        </form>
    </div>
</body>
</html>
