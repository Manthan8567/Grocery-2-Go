<?php 
include ('../includes/connect.php');
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_subCategory=$_POST['product_subCategory'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];

    // accessing image temporary name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];

    // checking empty condition
    if($product_title=='' or $description== '' or $product_keywords=='' or $product_category=='' or $product_subCategory=='' or $product_price=='' or $product_image1=='' or $product_image2==''){

        echo "<script>alert('Please, fill all the available fields.'</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");

        //insert query
        $insert_products="insert into `products` (product_title, product_description, product_keywords, category_id, subCategory_id, product_image1, product_image2, product_price, date, status) values('$product_title', '$description', '$product_keywords', '$product_category', '$product_subCategory', '$product_image1', '$product_image2', '$product_price', NOW(), '$product_status')";
        $result_query=mysqli_query($con, $insert_products);
        if($result_query){
            echo "<script>alert('Product has been inserted successfully.')</script>";
            
        }

    }
    
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-dark">
    <div class="container mt-3">
        <h2 class="text-center text-light">Insert Products</h2>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">

            <!-- Title -->
            <div class="form-outline mb-2 w-50  m-auto">
                <label for="product_title" class="form-label text-light mt-2">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Entre product title" autocomplete="off" required="required">
            </div>

            <!-- Description -->
            <div class="form-outline mb-2 w-50  m-auto">
                <label for="description" class="form-label text-light mt-2">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Entre product description" autocomplete="off" required="required">
            </div>

            <!-- keyword -->
            <div class="form-outline mb-3 w-50  m-auto">
                <label for="product_keywords" class="form-label text-light mt-2">Product Keyword</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Entre product keywords" autocomplete="off" required="required">
            </div>

            <!-- categories -->
            <div class="form-outline mb-3 w-50  m-auto">
                <select name="product_category" id="" class="form-select form-select-sm">
                    <option value="">Select a Category</option>
                    <?php
                    
                        $select_query = "Select * from `categories`";
                        $result_query = mysqli_query($con, $select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }

                    ?>
                </select>
            </div>

            <!-- Sub categories -->
            <div class="form-outline mb-3 w-50  m-auto">
                <select name="product_subCategory" id="" class="form-select form-select-sm">
                    <option value="">Select a Sub Category</option>
                    <?php
                    
                        $select_query = "Select * from `subCategories`";
                        $result_query = mysqli_query($con, $select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $subCategory_title=$row['subCategory_title'];
                            $subCategory_id=$row['subCategory_id'];
                            echo "<option value='$subCategory_id'>$subCategory_title</option>";
                        }

                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-2 w-50  m-auto">
                <label for="product_image1" class="form-label text-light mt-2">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-2 w-50  m-auto">
                <label for="product_image2" class="form-label text-light mt-2">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            
            <!-- Price -->
            <div class="form-outline mb-4 w-50  m-auto">
                <label for="product_price" class="form-label text-light mt-2">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Entre product price" autocomplete="off" required="required">
            </div>

            <!-- Insert Product -->
            <div class="form-outline mb-3 w-50  m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3 text-darkt" value="Insert Product">
            </div>
        </form>
    </div>
    
</body>
</html>