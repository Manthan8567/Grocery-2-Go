<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
    .admin-img{
        display: block;
        width: 5%;
        height: 5%;
        object-fit: contain;
        margin-bottom: 10px;
        margin-left: auto;
        margin-right: auto;
    }
    /* .footer{
        position: absolute;
        bottom:0;
    } */
    body{
        overflow-x:hidden;
    }
    .product_img{
        width:100px;
        object-fit:contain;
    }
    </style>

</head>
<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item-cat">
                            <a href="" class="nav-link text-light">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Admin Panel</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 align-items-center d-inline-block">
                <div class="p-2">
                    <a href="#"><img src="../images/admin.jpg" alt="" class="admin-img"></a>
                    <p class="text-light text-center">Admin</p>
                </div>
                <div class="button text-center d-flex justify-content-around mx-5">
                    <button class="bg-dark p-1 my-1 border-0 rounded text-light"><a href="index.php?insert_category" class="nav-link text-light bg-dark p-1">Insert Category</a></button>
                    <button class="bg-dark p-1 my-1 border-0 rounded text-light"><a href="index.php?insert_subCategory" class="nav-link text-light bg-dark p-1">Insert Sub Category</a></button>
                    <button class="bg-dark p-1 my-1 border-0 rounded text-light"><a href="insert_product.php" class="nav-link text-light bg-dark p-1">Insert Products</a></button>
                    <button class="bg-dark p-1 my-1 border-0 rounded text-light"><a href="index.php?view_products" class="nav-link text-light bg-dark p-1">View Products</a></button>
                    <button class="bg-dark p-1 my-1 border-0 rounded text-light"><a href="index.php?list_users" class="nav-link text-light bg-dark p-1">List of Users</a></button>
                    <button class="bg-dark p-1 my-1 border-0 rounded text-light"><a href="logout.php" class="nav-link text-light bg-dark p-1">Logout</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- fourth child -->
    <div class="container my-4">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_subCategory'])){
            include('insert_subCategories.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        ?>
    </div>


    <!-- last child -->
<div class="bg-dark p-3 text-center text-light footer">
    <p>All rights reserved @ - Designed by </p>
</div> 

<!-- bootsrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>