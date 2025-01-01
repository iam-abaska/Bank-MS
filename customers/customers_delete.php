<?php

include('../includes/connection.php');
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    // echo $id;
    $sql_delete="Delete from `customers` where CustomerID=$id";
    $result=mysqli_query($conn,$sql_delete);
    if($result){
        echo "<script>alert('Record deleted successfully')</script>";
        echo "<script>window.open('customers_data.php','_self')</script>";
    }else{
        die(mysqli_error($conn));
    }
}

?>
