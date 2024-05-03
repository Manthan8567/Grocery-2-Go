<?php
// include connect file
//include('./includes/connect.php');

// getting products on home page
function getproducts(){
    global $con;

    // condition to check isset or not
    if(!isset($_GET['category'])){

        if(!isset($_GET['subCateogry'])){

    // add limit 0,9 command to below line to limit the showcasing on home page
    $select_query = "Select * from `products` order by rand() LIMIT 0,5";
    $result_query = mysqli_query($con, $select_query);
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $subCategory_id=$row['subCategory_id'];

        echo "<div class='col-md-4 mb-4'>
        <div class='card' style='width: 20rem;'>
            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More info</a>
                </div>
        </div>
    </div>";
    }
}
}
}

//getting all prodcuts
function get_all_products(){
    global $con;

    // condition to check isset or not
    if(!isset($_GET['category'])){

        if(!isset($_GET['subCateogry'])){

    // add limit 0,9 command to below line to limit the showcasing on home page
    $select_query = "Select * from `products` order by rand()";
    $result_query = mysqli_query($con, $select_query);
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $subCategory_id=$row['subCategory_id'];

        echo "<div class='col-md-4 mb-4'>
        <div class='card' style='width: 20rem;'>
            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More info</a>
                </div>
        </div>
    </div>";
    }
}
}
}

// getting unique categories
function get_unique_categories(){
    global $con;

    // condition to check isset or not
    if(isset($_GET['category'])){

        $category_id = $_GET['category'];

    // add limit 0,9 command to below line to limit the showcasing on home page
    $select_query = "Select * from `products` where category_id=$category_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows == 0){
        echo "<h2 class='display-1 mt-5 border rounded-3 border-danger w-50 position-absolute top-50 start-50 translate-middle shadow-lg p-3 mb-5 bg-body rounded text-center text-danger'>Stock Empty</h2>";
    }

    while($row = mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $subCategory_id=$row['subCategory_id'];

        echo "<div class='col-md-4 mb-4'>
        <div class='card' style='width: 20rem;'>
            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More info</a>
                </div>
        </div>
    </div>";
    }
}
}

// getting unique subcategories
function get_unique_subcategories(){
    global $con;

    // condition to check isset or not
    if(isset($_GET['subCateogry'])){

        $subCategory_id = $_GET['subCateogry'];

    // add limit 0,9 command to below line to limit the showcasing on home page
    $select_query = "Select * from `products` where subCategory_id=$subCategory_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows == 0){
        echo "<h2 class='display-1 mt-5 border rounded-3 border-danger w-50 position-absolute top-50 start-50 translate-middle shadow-lg p-3 mb-5 bg-body rounded text-center text-danger'>Stock Empty</h2>";
    }

    while($row = mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $subCategory_id=$row['subCategory_id'];

        echo "<div class='col-md-4 mb-4'>
        <div class='card' style='width: 20rem;'>
            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More info</a>
                </div>
        </div>
    </div>";
    }
}
}

// Displaying Category in side navbar
function getCategory(){
    global $con;
    $select_category = "Select * from `categories`";
    $result_category = mysqli_query($con, $select_category);
            
    while($row_data = mysqli_fetch_assoc($result_category)){
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo "<li class='nav-item-cat'>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
    </li>";
    }
}

// Displaying subCategory in side navbar
function getSubCategory(){
    global $con;
    $select_subCategory = "Select * from `subCategories`";
    $result_subCategory = mysqli_query($con, $select_subCategory);
    while($row_data = mysqli_fetch_assoc($result_subCategory)){
    $subCategory_title = $row_data['subCategory_title'];
    $subCategory_id = $row_data['subCategory_id'];
    echo "<li class='nav-item-cat'>
    <a href='index.php?subCateogry=$subCategory_id' class='nav-link text-light'>$subCategory_title</a>
    </li>";
    }
}

// get searching products
function search_product(){
    global $con;

    if(isset($_GET['search_data_product'])){

        $search_data_value = $_GET['search_data'];

    // add limit 0,9 command to below line to limit the showcasing on home page
    $search_query= "Select * from `products` where product_keywords like '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);

    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows == 0){
        echo "<h2 class='display-1 mt-5 border rounded-3 border-danger w-50 position-absolute top-50 start-50 translate-middle shadow-lg p-3 mb-5 bg-body rounded text-center text-danger'>No Results Match</h2>";
    }

    while($row = mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $subCategory_id=$row['subCategory_id'];

        echo "<div class='col-md-4 mb-4'>
        <div class='card' style='width: 20rem;'>
            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More info</a>
                </div>
        </div>
    </div>";
    }
}
}

//view detail function
function view_details(){
    global $con;

    // condition to check isset or not
    if(isset($_GET['product_id'])){

    
    if(!isset($_GET['category'])){

        if(!isset($_GET['subCateogry'])){

            $product_id = $_GET['product_id'];

    // add limit 0,9 command to below line to limit the showcasing on home page
    $select_query = "Select * from `products` where product_id=$product_id";
    $result_query = mysqli_query($con, $select_query);

    while($row = mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $subCategory_id=$row['subCategory_id'];

        echo "<div class='col-md-4 mb-4'>
        <div class='card' style='width: 20rem;'>
            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='index.php' class='btn btn-secondary'>Home</a>
                    
                </div>
        </div>
    </div>
    
    <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <!--  -->
                    </div>
                        
                    <div class='col-md-6 card' style='width: 20rem;'>
                        <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    </div>

                    <div class='col-md-6 card' style='width: 20rem;'>
                        <img src='./Admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                </div>
            </div>";
    }
}
}
}
}

// Get IP address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 


// Cart function
function cart(){
if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress(); 
    $get_product_id = $_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address = '$get_ip_add' and product_id = $get_product_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows > 0){
        echo "<script>alert('This item is already in cart.')</script>";
        echo "<script>window.open('index.php','_self')</script>";

    }else{
        $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id,'$get_ip_add',0)";
        $result_query = mysqli_query($con, $insert_query);
        echo "<script>alert('The item is added to cart.')</script>";
        echo "<script>window.open('index.php','_self')</script>";

    }
}
}

//function to get cart item numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress(); 
        $select_query="Select * from `cart_details` where ip_address = '$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $con;
        $get_ip_add = getIPAddress(); 
        $select_query="Select * from `cart_details` where ip_address = '$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    
        }
        echo $count_cart_items;
    }


// total price function    
function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="Select * from  `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con, $cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_product="Select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con, $select_product);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price += $product_values;
        }
    }

    echo $total_price;
}

//get user order details
function get_user_order_details(){
    global $con;
    $username = $_SESSION['username'];
    $get_details = "Select * from `user_table` where username = '$username'";
    $result_query = mysqli_query($con, $get_details);
    while($row_query = mysqli_fetch_array($result_query)){
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders = "Select * from `user_orders` where user_id = $user_id and order_status = 'pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if($row_count > 0){
                        // echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>$row_count</span> pending order.</h3>
                        // <p class='text-center'><a class='text-dark' href='profile.php?my_orders'>Order Details</a></p>";
                    }else{
                        echo "<p class='text-center my-3'><a class='text-dark' href='profile.php?my_orders'>Order Details</a></p><p class='text-center'><a class='text-dark' href='../index.php'>Explore Products</a></p>";
                    }
                }
            }
        }
    }
}

?>