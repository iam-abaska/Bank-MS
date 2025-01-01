<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$customer = $_POST['customer'];
   	$username = $_POST['username'];
   	$password =$_POST['password'];
   	$insert = "INSERT INTO `userlogin`(`CustomerID`, `Username`, `Password`) VALUES ('$customer','$username','$password')";
   	$result = mysqli_query($conn, $insert);
   if($result){
    echo "<script>alert('Data Inserted Successfully!')</script>";
   }
   else{
   	 echo "failed!";
    }
}
$sql = "SELECT customers.CustomerID,' ',customers.FullName FROM customers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <link rel="stylesheet" href="userlogin.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>User Login Table</h2>

            <label for="account">Select Customer:</label>
            <select id="account" name="customer" required>
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
            
                <label for="name">Username:</label>
            <input type="text" id="name" name="username" placeholder="Enter Username" required>


            <label for="email">Password:</label>
            <input type="password" id="email" name="password" placeholder="Enter Password" required>

            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="userlogin_data.php" class="show_btn">Show User Login Data</a>
            </div>
        </form>
    </div>
</body>
</html>
