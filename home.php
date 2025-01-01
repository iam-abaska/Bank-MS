<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Dashboard</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="dashboard-container">
        
        <div class="logout">
        <a href="logout.php" class="menu-button">LogOut</a>
        </div>
        <!-- Cards -->
        <div class="dashboard-card">
            <h2>Branches Table</h2>
            <div class="button-row">
            <a href="branches/branches.php" class="menu-button">Add New Branch</a>
            <a href="branches/branches_data.php" class="menu-button">View Branches Table</a>
        </div>
        </div>


        <div class="dashboard-card">
            <h2>Employee Table</h2>
            <div class="button-row">
            <a href="employees/employee.php" class="menu-button">Add New Employee</a>
            <a href="employees/employee_data.php" class="menu-button">View Employees Table</a>
        </div>
        </div>
        
        
        <div class="dashboard-card">
            <h2>Customers Table</h2>
            <div class="button-row">
            <a href="customers/customers.php" class="menu-button">Add New Customer</a>
            <a href="customers/customers_data.php" class="menu-button">View Customers Table</a>
        </div>
        </div>
        
        
        <div class="dashboard-card">
            <h2>Accounts Table</h2>
            <div class="button-row">
            <a href="accounts/accounts.php" class="menu-button">Add New Account</a>
            <a href="accounts/accounts_data.php" class="menu-button">View Accounts Table</a>
        </div>
        </div>


        <div class="dashboard-card">
            <h2>Transactions Table</h2>
            <div class="button-row">
            <a href="transactions/transaction.php" class="menu-button">Add New Transaction</a>
            <a href="transactions/transaction_data.php" class="menu-button">View Transactions Table</a>
        </div>
        </div>
        
        
        <div class="dashboard-card">
            <h2>Loans Table</h2>
            <div class="button-row">
            <a href="loans/loans.php" class="menu-button">Add New Loan</a>
            <a href="loans/loans_data.php" class="menu-button">View Loans Table</a>
        </div>
        </div>

        

        <div class="dashboard-card">
            <h2>Loan Payments Table</h2>
            <div class="button-row">
            <a href="loans_payment/loans_pay.php" class="menu-button">Add New Loan Payment</a>
            <a href="loans_payment/loans_pay_data.php" class="menu-button">View Loans Payment Table</a>
        </div>
        </div>

        <div class="dashboard-card">
            <h2>User Login Table</h2>
            <div class="button-row">
            <a href="userslogin/userlogin.php" class="menu-button">Add New User</a>
            <a href="userslogin/userlogin_data.php" class="menu-button">View Users Payment Table</a>
        </div>
        </div>

    </div>
</body>
</html>


<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>