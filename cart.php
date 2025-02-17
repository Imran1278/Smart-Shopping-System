    <!-- Connect Files -->
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
        <title>E Commerce Cart Details</title>
        <!-- Css Link -->
        <link rel="stylesheet" href="./style.css">
        <!-- Bootstrap Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awsome Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"></link>
        <style>
            .cart_image
            {
                width: 80px;
                height: 80px;
                object-fit:contain;
            }
        </style>
    </head>
    <body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
        <img src="./images/logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./user_area\user_registration.php">Register</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./admin_area/index.php">Admin</a>
            </li>
            
        
            <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
            </li> -->
            <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-plus"></i><sup><?php cart_items();?></sup></a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Cart calling function -->
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
                </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                </li>";
            }
            
            if(!isset($_SESSION['username'])){
                echo "<li class='nav_item'>
                <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                </li>";
            }else{
                echo "<li class='nav_item'>
                <a class='nav-link' href='./user_area/logout.php'>Logout</a>
                </li>";
            }
            ?>
    </ul>
    </nav>

    <!-- Third Child -->
    <div class="bg-light">
    <h3 class="text-center">My Store</h3>
    <p class="text-center">Communications is at the heart of E-commerce and Community</p>
    </div>

    <!-- Fourth Child -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
                <!-- <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan="2">Operations</th>
                    </tr>
                </thead> -->
                <tbody>
                    <!-- PHP code to display dynamic code -->
                    <?php
                        $get_ip_add= getIpAddress();
                        $total_price=0;
                        $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                        $result=mysqli_query($con,$cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0){
                            echo "<thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                    </thead>";
                        while($row=mysqli_fetch_array($result))
                        {
                            $products_id=$row['products_id'];
                            $select_products="Select * from `products` where products_id='$products_id'";
                            $result_products=mysqli_query($con,$select_products);
                            while($row_products_price=mysqli_fetch_array($result_products))
                            {
                                $products_price=array($row_products_price['products_price']);
                                $products_table=$row_products_price['products_price'];
                                $products_title=$row_products_price['products_title'];
                                $products_image1=$row_products_price['products_image1'];
                                $products_values=array_sum($products_price);
                                $total_price+=$products_values;
                    ?>
                    <tr>
                        <td><?php echo $products_title ?></td>
                        <td><img src="./admin_area/products_images/<?php echo $products_image1 ?>" alt="" class="cart_image"></td>
                        <td><input type="text" name="qty" class="form-input w-50"></td>
                        <?php
                            $get_ip_add= getIpAddress();
                            if(isset($_POST['update_cart']))
                            {
                                $quantities=$_POST['qty'];
                                $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                                $result_products_quantity=mysqli_query($con,$update_cart);
                                // $total_price=$total_price*$quantities;
                                $total_price = is_numeric($total_price) ? $total_price : 0;
                                $quantities = is_numeric($quantities) ? $quantities : 1;
                                $total_price = $total_price * $quantities;
                            }
                        ?>
                        <td><?php echo $products_table ?>/-</td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $products_id ?>"></td>
                        <td>
                            <input type="submit" class="bg-info px-3 py-2 border-0 mx-3" value="Update Cart" name="update_cart">
                            <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                            <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                            <input type="submit" class="bg-info px-3 py-2 border-0 mx-3" value="Remove Cart" name="remove_cart">
                        </td>
                    </tr>
                    <?php 
                    }
                    }
                    }
                    else{
                        echo "<h2 class='text-center text-danger'>Cart Is Empty</h2>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- subtotal -->
            <div class="d-flex mb-5">
                <?php
                        $get_ip_add= getIpAddress();
                        // $total_price=0;
                        $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                        $result=mysqli_query($con,$cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0)
                        {
                            echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>$total_price/-</strong></h4>
                            <input type='submit' class='bg-info px-3 py-2 border-0 mx-3' value='Continue Shopping' name='continue_shopping'>
                            <button class='bg-secondary p-3 py-2 border-0'><a href='./user_area/checkout.php' class=' text-light text-decoration-none'>Checkout</a></button>";
                        }
                        else{
                            echo "<input type='submit' class='bg-info px-3 py-2 border-0 mx-3' value='Continue Shopping' name='continue_shopping'>";
                        }
                        if(isset($_POST['continue_shopping'])){
                            echo "<script>window.open('index.php', '_self')</script>";
                        }
                ?>
                
                
            </div>
        </div>
    </div>
    </form>
    <!-- fuction to remove item -->
    <?php
        function remove_cart_item(){
            global $con;
            if(isset($_POST['remove_cart'])){
                foreach($_POST['removeitem'] as $remove_id){
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where products_id=$remove_id";
                    $run_query=mysqli_query($con,$delete_query);
                    if($run_query){
                        echo "<script>window.open('cart.php', '_self')</script>";
                    }
                }
            }
        }
        echo $remove_item=remove_cart_item();

    ?>











    <!-- last child -->
    <!-- Include footer -->
    <?php
    include("./includes/footer.php")
    ?>






    </div>






    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>