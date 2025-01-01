<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="branches_data.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <h2>Branches Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `branches`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Branch Name</th>
        <th>Branch Address</th>
        <th>Branch Phone</th>
        <th>Branch Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['BranchID'];
            // echo $id;
            $id=$row['BranchID'];
$BranchName=$row['BranchName'];
$Address=$row['Address'];
$Phone=$row['Phone'];
$Email=$row['Email'];
echo " <tr>
<td>$i</td>
<td>$BranchName</td>
<td>$Address</td>
<td>$Phone</td>
<td>$Email</td>
<td>
<a href='branches_update.php?update_id=$id'><i class='fa-solid fa-pen-to-square'></i></a>
<a href='branches_delete.php?delete_id=$id'><i class='fa-solid fa-trash'></i></a>
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