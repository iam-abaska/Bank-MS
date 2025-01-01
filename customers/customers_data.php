<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="customers_data.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <h2>Customers Table Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `customers`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Date of Birth</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Date-Joined</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['CustomerID'];
            // echo $id;
            $id=$row['CustomerID'];
$cid=$row['CustomerID'];
$Name=$row['FullName'];
$date=$row['DateOfBirth'];
$Address=$row['Address'];
$Phone=$row['Phone'];
$Email=$row['Email'];
$joined=$row['DateJoined'];
echo " <tr>
<td>$i</td>
<td>$cid</td>
<td>$Name</td>
<td>$date</td>
<td>$Address</td>
<td>$Phone</td>
<td>$Email</td>
<td>$joined</td>
<td>
<a href='customers_update.php?update_id=$id'><i class='fa-solid fa-pen-to-square'></i></a>
<a href='customers_delete.php?delete_id=$id'><i class='fa-solid fa-trash'></i></a>
</td>
</tr>";
$i++;
        }
      }
    else{
        echo "<h3 class='no_records'>No Records to display</h3>";
    }
?>          </tbody>
      </table>
    </div>