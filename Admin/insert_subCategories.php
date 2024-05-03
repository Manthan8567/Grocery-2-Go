<?php 
include ('../includes/connect.php');
if(isset($_POST['insert_subCat'])){
    $subCategory_title = $_POST['subCat_title'];


    // select data from database
    $select_query = "Select * from `subCategories` where subCategory_title = '$subCategory_title'";
    $result_select = mysqli_query($con, $select_query);

    $number = mysqli_num_rows($result_select);
    if($number>0){
        echo"<script>alert('The sub category already exist in the database.')</script>";
    }else{
    $insert_query="insert into `subCategories` (subCategory_title) values ('$subCategory_title')";
    $result = mysqli_query($con, $insert_query);
    if($result){
        echo"<script>alert('Sub Category has been added successfully.')</script>";
    }
}
}
?>

<h2 class="text-center">Insert Sub Categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="subCat_title" placeholder="Insert Sub category" aria-label="subCategories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-dark text-light border-0 rounded p-2 my-3" name="insert_subCat" value="Insert Sub Categories">
    
    </div>
</form>