<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php
    $get_users= "Select * from `user_table`";
    $result = mysqli_query($con, $get_users);
    $row_count = mysqli_num_rows($result);

    if($row_count==0){
        echo"<h2 class='text-center text-danger my-5'>No Users</h2>";
    }else{
        echo"<tr>
        <th>Sl no</th>
        <th>Username</th>
        <th>User email</th>
        <th>User Iamge</th>
        <th>User address</th>
        <th>User mobile</th>
        
        </tr>
        </thead>
        <tbody class='bg-secondary text-dark'>";
        $number=0;
        while($row_data = mysqli_fetch_assoc($result)){
            $user_id = $row_data['user_id'];
            $username = $row_data['username'];
            $user_email = $row_data['user_email'];
            $user_image = $row_data['user_image'];
            $user_address = $row_data['user_address'];
            $user_mobile = $row_data['user_mobile'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img class='product_img' src='../users_area/user_images/$user_image' alt='$username'</td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            
            </tr>";
        }
    }


    ?>
    </tbody>
    </thead>
</table>
