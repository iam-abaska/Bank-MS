<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="loans_data.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <h2>Loans Table Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `loans`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Customer ID</th>
        <th>Loan Type</th>
        <th>Loan Amount</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Loan Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['LoanID'];
            // echo $id;
            $id=$row['LoanID'];
$customer=$row['CustomerID'];
$type=$row['LoanType'];
$amount=$row['LoanAmount'];
$start=$row['LoanStartDate'];
$end=$row['LoanEndDate'];
$status=$row['LoanStatus'];
echo " <tr>
<td>$i</td>
<td>$customer</td>
<td>$type</td>
<td>$amount</td>
<td>$start</td>
<td>$end</td>
<td>$status</td>
<td>
<a href='loans_update.php?update_id=$id'><i class='fa-solid fa-pen-to-square'></i></a>
<a href='loans_delete.php?delete_id=$id'><i class='fa-solid fa-trash'></i></a>
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