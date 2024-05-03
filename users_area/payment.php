<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .payment-img{
            width: 90%;
            margin: auto;
            display: block;
        }
        </style>
</head>
<body>
    <!-- php code to access user id -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "Select * from `user_table` where user_ip='$user_ip'";
    $result = mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];


    ?>
    <div class="container">
    <h2 class="text-center text-info">Payment Options</h2>
    <div class="row d-flex justify-content-center align-items-center mt-5 mb-3">
        <div class="col-md-6">
        <a href="https://www.interac.ca/en/consumers/support/faq-consumers/interac-e-transfer/"  target="_blank"><img class="payment-img" src="../images/upi.jpg"></a>
        </div>
        <div class="col-md-6">
        <a href="order.php?user_id = <?php echo $user_id ?>"><h2 class="text-center">Cash On Delivery</h2></a>
        </div>
        
    </div>
   </div>
</body>
</html>