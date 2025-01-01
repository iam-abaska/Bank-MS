<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$name = $_POST['name'];
   	$address = $_POST['address'];
   	$phone =$_POST['phone'];
    $email =$_POST['email'];
   	$insert = "INSERT INTO `branches`(`BranchName`, `Address`, `Phone`, `Email`) VALUES ('$name','$address','$phone','$email')";
   	$result = mysqli_query($conn, $insert);
   if($result){
    echo "<script>alert('Data Inserted Successfully!')</script>";
   }
   else{
   	 echo "failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches Table</title>
    <link rel="stylesheet" href="branches.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Branches Table</h2>

            <label for="name">Branch Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Branch Name" required>


            <label for="address">Branch Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter Branch Address" required>


            <label for="phone">Branch Contact No:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter Branch Phone" required>


            <label for="email">Branch Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter Branch Email" required>



            
            
            
            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="branches_data.php" class="show_btn">Show Employee Data</a>
            </div>
        </form>
    </div>
</body>
</html>
