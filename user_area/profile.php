<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome <?php  echo $_SESSION['username']  ?></title>
        <!-- Css Link -->
    <link rel="stylesheet" href="./style.css">
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awsome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"></link>
    <style>
        .profile_img{
            width:90%;
            margin:auto;
            display: block;
            object-fit: contain;
        }
        body{
            overflow-x:hidden;
        }
        .logo{
            width: 20px;
            height: 20px;
            }
            .edit_image{
                object-fit: contain;
                width: 100px;
                height: 100px; 
            }
    </style>
    </head>
    <body>
            


            <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
        <img src="../images/logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="profile.php">My Account</a>
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
            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-plus"></i><sup><?php cart_items();?></sup></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Total Cost: <?php total_cart_price();?>/-</a>
            </li>
        </ul>
        <form class="d-flex" action="../search_products.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_products">
        </form>
        </div>
    </div>
    </nav>
        <!-- calling cart function -->
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
    <div class="row">
        <div class="col-md-2">
            <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
                </li>
                <?php
                    $username=$_SESSION['username'];
                    $user_image="Select * from `user_table` where username='$username'";
                    $user_image=mysqli_query($con,$user_image);
                    $row_image=mysqli_fetch_array($user_image);
                    $user_image=$row_image['user_image'];
                    echo "<li class='nav-item'>
                            <img src='../images/$user_image' class='profile_img my-4' alt=''>
                        </li>"
                ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">Logout</a>
                </li>
        </ul>
        </div>   
                <div class="col-md-10 text-center">
                    <?php
                        get_user_order_details();
                        if(isset($_GET['edit_account'])){
                            include('edit_account.php');
                        }
                        if(isset($_GET['my_orders'])){
                            include('user_orders.php');
                        }
                        if(isset($_GET['delete_account'])){
                            include('delete_account.php');
                        }

                    ?>
                </div>
    </div>





    <!-- last child -->
<!-- Include footer -->
    <?php
    include("../includes/footer.php")
    ?>
    <!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
    </html>