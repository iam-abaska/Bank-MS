<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="accounts_data.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <h2>Accounts Table Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `accounts`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Account ID</th>
        <th>Customer ID</th>
        <th>Account Type</th>
        <th>Account Balance</th>
        <th>Account Status</th>
        <th>Date Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['AccountID'];
            // echo $id;
            $id=$row['AccountID'];
$aid=$row['AccountID'];
$customer=$row['CustomerID'];
$type=$row['AccountType'];
$balance=$row['Balance'];
$status=$row['AccountStatus'];
$date=$row['DateCreated'];
echo " <tr>
<td>$i</td>
<td>$aid</td>
<td>$customer</td>
<td>$type</td>
<td>$balance</td>
<td>$status</td>
<td>$date</td>
<td>
<a href='accounts_update.php?update_id=$id'><i class='fa-solid fa-pen-to-square'></i></a>
<a href='accounts_delete.php?delete_id=$id'><i class='fa-solid fa-trash'></i></a>
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