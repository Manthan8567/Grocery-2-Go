<!-- connect file -->

<?php 
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery 2 Go - Cart</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css file -->
    <link rel="stylesheet" href="./style.css">

    <style>
        .cart_img{
        width: 75px;
        height: 75px;
        object-fit: contain;
        }
    </style>

</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <img src="./images/logo.png" alt=""  class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        

<!-- Calling cart function -->
<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <?php
        if(!isset($_SESSION['username'])){

          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
          </li>  ";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
        }
        ?> 
        <?php
        if(!isset($_SESSION['username'])){

          echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li> ";
        }else{
          echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li> ";
        }
        ?> 
    </ul>
</nav>

<!-- third child -->
<div class="bg-light mb-4">
    <h3 class="text-center">Grocery Store</h3>
    <p class="text-center pb-2">Everything at your convinience</p>
</div>


<!-- fourth child -->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
            <tbody>
                <!-- php code to display dynaamic data -->
                <?php
                global $con;
                $get_ip_add = getIPAddress();
                $total_price=0;
                $cart_query="Select * from  `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($con, $cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                  echo " <thead>
                  <tr>
                      <th>Product Title</th>
                      <th>Product Image</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Remove Item</th>
                      <th colspan='2'>operations</th>
                  </tr>
              </thead>";
                while($row=mysqli_fetch_array($result)){
                    $product_id=$row['product_id'];
                    $select_product="Select * from `products` where product_id='$product_id'";
                    $result_products=mysqli_query($con, $select_product);
                    while($row_product_price=mysqli_fetch_array($result_products)){
                        $product_price=array($row_product_price['product_price']);
                        $price_table=$row_product_price['product_price'];
                        $product_title=$row_product_price['product_title'];
                        $product_image1=$row_product_price['product_image1'];
                        $product_values=array_sum($product_price);
                        $total_price += $product_values;
                    
                ?>

                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./Admin/product_images/<?php echo $product_image1 ?>" class="cart_img"></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50 text-center"></td>
                    <?php
                    $get_ip_add = getIPAddress();
                    if(isset($_POST['update_cart'])){
                      $quantities = $_POST['qty'];
                      $update_cart = "update `cart_details` set quantity = $quantities where ip_address='$get_ip_add'";
                      $result_products_quantity=mysqli_query($con, $update_cart);
                      $total_price=$total_price*$quantities;
                    }
                    ?>
                    <td>$<?php echo $price_table ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                        <!-- <button class="bg-dark text-light px-3 py-2 mx-3 rounded">Update</button> -->
                        <input class="bg-dark text-light px-3 py-2 mx-3 rounded" type="submit" value="Update cart" name="update_cart">
                        <!-- <button class="bg-dark text-light px-3 py-2 mx-3 rounded">Remove</button> -->
                        <input class="bg-dark text-light px-3 py-2 mx-3 rounded" type="submit" value="Remove cart" name="remove_cart">
                    </td>
                </tr>
                <?php
                }
                }
                }
                else{
                  echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                }
                ?>
            </tbody>
        </table> 
        <!-- Sub Total -->
        <div class="d-flex mb-5">
          <?php
          $get_ip_add = getIPAddress();
          $cart_query="Select * from  `cart_details` where ip_address='$get_ip_add'";
          $result=mysqli_query($con, $cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){
            echo "
            <h4 class='px-3'>Subtotal:<strong class='text-primary'> $$total_price </strong></h4>
            <input class='bg-dark text-light px-3 py-2 mx-3 rounded' type='submit' value='Continue Shopping' name='continue_shopping'>
            <button class='bg-secondary p-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</button>";
          }
          else{
            echo "<input class='bg-dark text-light px-3 py-2 mx-3 rounded' type='submit' value='Continue Shopping' name='continue_shopping'>";
          }
          if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
          }
          ?>
        </div>
    </div>
</div>
</form>

<!-- Function to remove item -->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem']as $remove_id){
      echo $remove_id;
      $delete_query = "Delete from `cart_details` where product_id = $remove_id";
      $run_delete = mysqli_query($con,$delete_query);
      if($run_delete){
      echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item = remove_cart_item();
?>

<!-- last child -->
<!-- include footer -->
<?php 
include('./includes/footer.php');
?>



<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>