<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$name = $_POST['name'];
   	$position = $_POST['position'];
    $branch =$_POST['branch'];
    $email =$_POST['email'];
   	$phone =$_POST['phone'];
    
   	$insert = "INSERT INTO `employees`(`FullName`, `Position`, `BranchID`, `Phone`, `Email`) VALUES ('$name','$position','$branch','$email','$phone')";
   	$result = mysqli_query($conn, $insert);
   if($result){
    echo "<script>alert('Data Inserted Successfully!')</script>";
   }
   else{
   	 echo "failed!";
    }
}
$sql = "SELECT BranchID,BranchName FROM branches";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table</title>
    <link rel="stylesheet" href="employee.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Employee Table</h2>

            <label for="name">Employee Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Employee Name" required>


            <label for="position">Select Position:</label>
            <select id="position" name="position" required>
            <option value="" disabled selected>Select Position</option>
            <option value="Branch Manager">Branch Manager</option>
            <option value="Bank Teller">Bank Teller</option>
            <option value="Loan Officer">Loan Officer</option>
            <option value="Customer Service">Customer Service</option>
            <option value="Accountant">Accountant</option>
            <option value="IT Specialist">IT Specialist</option>
            <option value="Compliance Officer">Compliance Officer</option>
            </select>



            <label for="branch">Select Branch:</label>
            <select id="branch" name="branch" required>
                <option value="" disabled selected>Select Branch</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['BranchID'] . "'>" . $row['BranchName'] . "</option>";
                    }
                } else {
                    echo "<option value='' disabled>No Suppliers Available</option>";
                }
                ?>
            </select>


            <label for="email">Branch Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter Branch Email" required>
            
            
            <label for="phone">Employee Contact No:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter Branch Phone" required>
 
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="employee_data.php" class="show_btn">Show Employee Data</a>
            </div>
        </form>
    </div>
</body>
</html>
