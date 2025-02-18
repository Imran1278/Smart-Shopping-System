<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fuild">
        <h2 class="text-center my-3">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" 
                        name="user_username"/>
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="user_useremail" class="form-label">Email</label>
                        <input type="email" id="user_useremail" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" 
                        name="user_useremail"/>
                    </div>
                    <!-- image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Image</label>
                        <input type="file" id="user_image" class="form-control" required="required" 
                        name="user_image"/>
                    </div>
                    <!-- password -->
                    <div class="form-outline mb-4">
                        <label for="user_userpassword" class="form-label">Password</label>
                        <input type="password" id=user_userpassword" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" 
                        name="user_userpassword"/>
                    </div>
                    <!-- conform password -->
                    <div class="form-outline mb-4">
                        <label for="user_userconfirmpassword" class="form-label">Confirm Password</label>
                        <input type="password" id="user_userconfirmpassword" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" 
                        name="user_userconfirmpassword"/>
                    </div>
                    <!-- address -->
                    <div class="form-outline mb-4">
                        <label for="user_useraddress" class="form-label">Address</label>
                        <input type="text" id="user_useraddress" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" 
                        name="user_useraddress"/>
                    </div>
                    <!-- contact -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact" autocomplete="off" required="required" 
                        name="user_contact"/>
                    </div>
                    <!-- register button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_useremail=$_POST['user_useremail'];
        $user_userpassword=$_POST['user_userpassword'];
        $hash_password=password_hash($user_userpassword,PASSWORD_DEFAULT);
        $user_userconfirmpassword=$_POST['user_userconfirmpassword'];
        $user_useraddress=$_POST['user_useraddress'];
        $user_contact=$_POST['user_contact'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        // select query
        $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_useremail'";
        $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script>alert('User and Email Already Exist')</script>";
        }elseif (strcmp($user_userpassword, $user_userconfirmpassword) !== 0) {
            echo "<script>alert('Passwords Do Not Match')</script>";
        }else{
            // insert query
        move_uploaded_file($user_image_tmp,"./users_images/$user_image");
        $insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username',
        '$user_useremail','$hash_password','$user_image','$user_ip','$user_useraddress','$user_contact')";
        $sql_excute=mysqli_query($con,$insert_query);
        echo "<script>alert('User Has Been Register')</script>";
        }

        //selecting cart items
        $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart_items);
        $rows_count=mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items your cart');</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            "<script>window.open('../index.php','_self')</script>";
        }

        
        
    }











?>