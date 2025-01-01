<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="loans_pay_data.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <h2>Loans Payment Table Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `loanrepayments`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Loan ID</th>
        <th>Repayment Date</th>
        <th>Repayment Amount</th>
        <th>Remaining Balance</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['RepaymentID'];
            // echo $id;
            $id=$row['RepaymentID'];
$loan=$row['LoanID'];
$date=$row['RepaymentDate'];
$amount=$row['RepaymentAmount'];
$balance=$row['RemainingBalance'];
echo " <tr>
<td>$i</td>
<td>$loan</td>
<td>$date</td>
<td>$amount</td>
<td>$balance</td>
<td>
<a href='loans_pay_update.php?update_id=$id'><i class='fa-solid fa-pen-to-square'></i></a>
<a href='loans_pay_delete.php?delete_id=$id'><i class='fa-solid fa-trash'></i></a>
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