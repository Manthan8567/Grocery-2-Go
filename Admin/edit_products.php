<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data = "Select * from `products` where product_id= $edit_id";
    $result = mysqli_query($con, $get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $subCategory_id =$row['subCategory_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_price=$row['product_price'];

    //fetching category names
    $select_category = "Select * from `categories` where category_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
    

    //fetching Subcategory names
    $select_Subcategory = "Select * from `subcategories` where subCategory_id=$subCategory_id";
    $result_Subcategory = mysqli_query($con, $select_Subcategory);
    $row_Subcategory=mysqli_fetch_assoc($result_Subcategory);
    $subCategory_title = $row_Subcategory['subCategory_title'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" value="<?php echo $product_description ?>" name="product_description" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" value="<?php echo $product_keywords ?>" name="product_keywords" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Categories</label>
                <select name="product_category" class="form-select">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                    <?php
                     $select_category_all = "Select * from `categories`";
                     $result_category_all = mysqli_query($con, $select_category_all);
                     while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                        $category_title=$row_category_all['category_title'];
                        $category_id = $row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                     };
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_subcategory" class="form-label">Product Sub-Categories</label>
                <select name="product_subcategory" class="form-select">
                <option value="<?php echo $subCategory_title ?>"><?php echo $subCategory_title ?></option>
                    <?php
                     $select_Subcategory_all = "Select * from `subcategories`";
                     $result_Subcategory_all = mysqli_query($con, $select_Subcategory_all);
                     while($row_Subcategory_all=mysqli_fetch_assoc($result_Subcategory_all)){
                        $Subcategory_title=$row_Subcategory_all['subCategory_title'];
                        $Subcategory_id = $row_Subcategory_all['subCategory_id'];
                        echo "<option value='$Subcategory_id'>$Subcategory_title</option>";
                     };
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img">
                </div>
            </div><div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image2</label>
                <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price" class="form-control" required="required">
            </div>
            <div class="text-center">
                <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>

    <!-- Editing Products -->
    <?php
    if(isset($_POST['edit_product'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_subcategory=$_POST['product_subcategory'];
        $product_price=$_POST['product_price'];

        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];

        $temp_image1=$_FILES['product_image1']['temp_name'];
        $temp_image2=$_FILES['product_image2']['temp_name'];

        // checking for fileds empty or not
        if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_subcategory=='' or $product_image1=='' or $product_image2=='' or $product_price==''){
            echo "<script>alert('Please fill all the fields')</script>";
        }else{
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");

            //query to update products
            $update_products = "Update `products` set product_title='$product_title', product_description='$product_description', product_keywords='$product_keywords', category_id = '$product_category', subCategory_id ='$subCategory_id', product_image1='$product_image1', product_image2='$product_image2', product_price='$product_price', date=NOW() where product_id=$edit_id";
            $result_update = mysqli_query($con,$update_products);
            if($result_update){
                echo "<script>alert('Product updated successfully')</script>";
                echo "<script>window.open('./index.php','_self')</script>";

            }

        }
    }

    ?>
</body>
</html>