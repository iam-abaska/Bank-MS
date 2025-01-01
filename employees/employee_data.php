<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="employee_data.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <h2>Employees Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `employees`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Employee Name</th>
        <th>Employee Position</th>
        <th>Employee Branch</th>
        <th>Employee Email</th>
        <th>Employee Phone</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['EmployeeID'];
            // echo $id;
            $id=$row['EmployeeID'];
$Name=$row['FullName'];
$position=$row['Position'];
$branch=$row['BranchID'];
$Phone=$row['Phone'];
$Email=$row['Email'];
echo " <tr>
<td>$i</td>
<td>$Name</td>
<td>$position</td>
<td>$branch</td>
<td>$Email</td>
<td>$Phone</td>
<td>
<a href='employee_update.php?update_id=$id'><i class='fa-solid fa-pen-to-square'></i></a>
<a href='employee_delete.php?delete_id=$id'><i class='fa-solid fa-trash'></i></a>
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