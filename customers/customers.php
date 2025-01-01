<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$name = $_POST['name'];
   	$date = $_POST['date'];
    $address =$_POST['address'];
    $email =$_POST['email'];
   	$phone =$_POST['phone'];
    
   	$insert = "INSERT INTO `customers`(`FullName`, `DateOfBirth`, `Address`, `Phone`, `Email`) VALUES ('$name','$date','$address','$phone','$email')";
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
    <title>Customers Table</title>
    <link rel="stylesheet" href="customers.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Customers Table</h2>

            <label for="name">Customer Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Customer Name" required>

            <label for="date">Customer Date of Birth:</label>
            <input type="date" id="date" name="date" placeholder="Enter Date of Birth" required>
            
            <label for="address">Customer Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter Customer Address" required>
            
            <label for="phone">Customer Contact No:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter Customer Phone" required>
            
            
            <label for="email">Customer Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter Customer Email" required>
            
 
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="customers_data.php" class="show_btn">Show Customers Data</a>
            </div>
        </form>
    </div>
</body>
</html>
