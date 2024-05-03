<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
            overflow-x:hidden;
        }
        </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    
                    <div class="">
                        <input type="submit" name="admin_login" id="" class="bg-info py-2 px-3 border-0" value="Login">
                        <p class="small fw-bold pt-1 mt-3">Don't have an account ? <a class="link-danger" href="admin_registration.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php

if(isset($_POST['admin_login'])){
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    $select_query="SELECT * from `admin_tabel` where admin_name='$admin_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);


    if($row_count>0){
        $_SESSION['username'] = $admin_username;
        if(password_verify($admin_password, $row_data['password'])){
            //echo "<script>alert('Login Successfully')</script>";
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }else{
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }else{
        echo "<script>alert('Login Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}

?>