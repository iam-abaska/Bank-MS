<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="transaction_data.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <h2>TransactionTable Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `transactions`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Account ID</th>
        <th>Transaction Type</th>
        <th>Transaction Amount</th>
        <th>Transaction Date</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['TransactionID'];
            // echo $id;
            $id=$row['TransactionID'];
$account=$row['AccountID'];
$type=$row['TransactionType'];
$amount=$row['Amount'];
$date=$row['TransactionDate'];
$Description=$row['Description'];
echo " <tr>
<td>$i</td>
<td>$account</td>
<td>$type</td>
<td>$amount</td>
<td>$date</td>
<td>$Description</td>
<td>
<a href='transaction_update.php?update_id=$id'><i class='fa-solid fa-pen-to-square'></i></a>
<a href='transaction_delete.php?delete_id=$id'><i class='fa-solid fa-trash'></i></a>
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