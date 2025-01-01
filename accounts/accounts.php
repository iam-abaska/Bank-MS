<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$customer = $_POST['customer'];
   	$type = $_POST['type'];
   	$balance =$_POST['balance'];
    $status =$_POST['status'];
   	$insert = "INSERT INTO `accounts`(`CustomerID`, `AccountType`, `Balance`, `AccountStatus`) VALUES ('$customer','$type','$balance','$status')";
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
    <title>Accounts Table</title>
    <link rel="stylesheet" href="accounts.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Accounts Table</h2>

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
            
            <label for="type">Select Account Type:</label>
            <select id="type" name="type" required>
            <option value="" disabled selected>Select Account Type</option>
            <option value="Current Account">Current Account</option>
            <option value="Saving Account">Saving Account</option>
            <option value="Fixed Deposit Account">Fixed Deposit Account</option>
            <option value="Salary Account">Salary Account</option>
            </select>

            <label for="balance">Account Balance:</label>
            <input type="text" id="balance" name="balance" placeholder="Enter Account Balance" required>         
            
            <label for="status">Select Account Status:</label>
            <select id="status" name="status" required>
            <option value="" disabled selected>Select Account Status</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Dormant">Dormant</option>
            </select>
            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="accounts_data.php" class="show_btn">Show Employee Data</a>
            </div>
        </form>
    </div>
</body>
</html>
