    <!-- Connect Files -->
    <?php
    include('..\includes\connect.php');
    // include('../functions/common_function.php');
    session_start();
    ?>
        

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E Commerce Checkout</title>
        <!-- Css Link -->
        <link rel="stylesheet" href="style.css">
        <!-- Bootstrap Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awsome Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"></link>
        <style>
            .logo{
                width: 2%;
                height: 2%;
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
            <a class="nav-link" href="user_registration.php">Register</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./admin_area/index.php">Admin</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        <form class="d-flex" action="search_products.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_products">
        </form>
        </div>
    </div>
    </nav>
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
                echo "<li class='nav-item'>
                <a class='nav-link' href='./user_login.php'>Login</a>
                </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='logout.php'>Logout</a>
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

    <!-- Fouth Child -->
    <div class="row">
        <div class="col-md-12">
            <!-- products -->
            <div class="row">
                <?php
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');
                    }
                    else{
                        include('payment.php'); 
                    }
                ?>
            </div>
        </div>
    </div>


    <!-- last child -->
    <!-- Include footer -->
    <?php
    include("../includes/footer.php")
    ?>






    </div>






    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>