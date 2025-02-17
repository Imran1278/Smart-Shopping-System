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
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <!-- Font Awsome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"></link>
    <style>
        .admin_image{
                width: 100px;
                object-fit: contain;
                    }
        /* Footer CSS */
.footer {
    position: fixed;
    bottom: 0;
    /* left: 0;
    width: 100%;
    background-color: #17a2b8; /* Use Bootstrap info color */
    /* padding: 10px 0; */ */
}
.body{
overflow-x: hidden;
}
.product_img{
    width:100px;
    object-fit:contain;
}

        
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
            <!-- Logo Image -->
            <img src="../images/logo.png" class="logo">
            <!-- Navbar Links and Content -->
            <div class="navbar-nav ms-auto"> 
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link"><h6>Welcome Guest</h6></a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- Second Child -->
            <div class="bg-light">
                <h4 class="text-center p-2">Manage Details</h4>
            </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-2">
                    <a href="#" ><img src="../images/admin.png" class="admin_image"></a>
                    <p class="text-light text-center">Admin Panel</p>
                </div>
                <div class="button text-center">
                    <button class="btn btn-info my-1 mb-2"><a href="insert_products.php" class="text-light text-decoration-none">Insert Products</a></button>
                    <button class="btn btn-info my-1 mb-2"><a href="index.php?veiw_products" class="text-light text-decoration-none">Veiw Products</a></button>
                    <button class="btn btn-info my-1 mb-2"><a href="./index.php?insert_catagories" class="text-light text-decoration-none">Insert Catagories</a></button>
                    <button class="btn btn-info my-1 mb-2"><a href="#" class="text-light text-decoration-none">Veiw Catagories</a></button>
                    <button class="btn btn-info my-1 mb-2"><a href="./index.php?insert_brands" class="text-light text-decoration-none">Insert Brands</a></button>
                    <button class="btn btn-info my-1 mb-2"><a href="#" class="text-light text-decoration-none">Veiw Brands</a></button>
                    <button class="btn btn-info my-1 mb-2"><a href="#" class="text-light text-decoration-none">All Orders</a></button>
                    <button class="btn btn-info my-1 mb-2"><a href="#" class="text-light text-decoration-none">All Payments</a></button>
                    <button class="btn btn-info my-1 mb-2"><a href="#" class="text-light text-decoration-none">List Orders</a></button>
                    <button class="btn btn-info my-1 mb-2"><a href="#" class="text-light text-decoration-none">Logout</a></button>
                </div>
            </div>
        </div>
        <!-- fouth child -->
            <div class="container my-3">
                <?php
                    if(isset($_GET['insert_catagories'])){
                        include('insert_catagories.php');
                    }
                    if(isset($_GET['insert_brands'])){
                        include('insert_brands.php');
                    }
                    if(isset($_GET['veiw_products'])){
                        include('veiw_products.php');
                    }
                    if(isset($_GET['edit_products'])){
                        include('edit_products.php');
                    }
                ?>
            </div>



        <!-- last child -->
                <!-- Include footer -->
    <?php
    include("../includes/footer.php")
    ?>
    </div>










    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>