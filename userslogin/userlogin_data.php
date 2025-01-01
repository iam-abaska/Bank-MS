<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="userlogin_data.css" />
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
    $select_query="Select * from `userlogin`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Customer ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['UserID'];
            // echo $id;
            $id=$row['UserID'];
$customer=$row['CustomerID'];
$username=$row['Username'];
$password=$row['Password'];
echo " <tr>
<td>$i</td>
<td>$customer</td>
<td>$username</td>
<td>$password</td>
<td>
<a href='userlogin_update.php?update_id=$id'><i class='fa-solid fa-pen-to-square'></i></a>
<a href='userlogin_delete.php?delete_id=$id'><i class='fa-solid fa-trash'></i></a>
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