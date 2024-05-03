<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$username = $_SESSION['username'];
$get_user = "Select * from `user_table` where username = '$username'";
$result = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];
?>


<h3 class="text-success text-center">
    All My Orders
</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-dark">
    <tr>
        <th>Sl no</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <tr>
            <td>1</td>
            <td>27</td>
            <td>3</td>
            <td>12131</td>
            <td>12/12</td>
            <td>Complete</td>
            <td>Confirm</td>
        </tr>
    </tbody>
</table>
</body>
</html>