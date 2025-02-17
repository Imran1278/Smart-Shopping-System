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
    <title>E Commerce Website</title>
    <!-- Css Link -->
    <link rel="stylesheet" href="./style.css">
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awsome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"></link>
    <style>
        body{
            overflow-x:hidden;
        }
        /* Chat icon style */
.chat-icon {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 9999; /* Ensure the chat icon is above other content */
}

.chat-icon:hover {
    background-color: #0056b3;
}

/* Chat popup container */
.chat-popup {
    position: fixed;
    bottom: 100px;
    right: 20px;
    width: 400px;
    height: 500px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 9998; /* Ensure the popup is above the page content but below the icon */
}

/* Chat header */
.chat-popup-header {
    background-color: #007bff;
    color: white;
    padding: 10px;
    font-size: 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Close button */
.close-btn {
    background: none;
    border: none;
    color: white;
    font-size: 20px;
    cursor: pointer;
}

/* Chat iframe */
.chat-iframe {
    flex: 1;
    border: none;
}

    </style>
</head>
<body>


    <!-- chat icon -->
    <div class="chat-icon" onclick="toggleChatPopup()">💬</div>
    <!-- Chat Popup -->
    <div class="chat-popup" id="chatPopup">
        <div class="chat-popup-header">
            Chat with us
            <button class="close-btn" onclick="toggleChatPopup()">×</button>
        </div>
        <iframe src="./chatbot.php" class="chat-iframe"></iframe>
    </div>
    <script>
    // Function to toggle the chat popup
    function toggleChatPopup() {
        const chatPopup = document.getElementById('chatPopup');
        if (chatPopup.style.display === 'none' || chatPopup.style.display === '') {
            chatPopup.style.display = 'flex';
        } else {
            chatPopup.style.display = 'none';
        }
    }
</script>



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
        <?php
          if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_area\profile.php'>My Account</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_area\user_registration.php'>Register</a>
          </li>";
          }
        ?>
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
        <li class="nav-item">
          <a class="nav-link" href="#">Total Cost: <?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_products">
      </form>
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

<!-- Fouth Child -->
  <div class="row">
    <div class="col-md-10">
      <!-- products -->
      <!-- first product -->
      <div class="row px-1">
        <!-- Fetching Products -->
        <?php
        // calling function
          getproducts();
          get_unique_catagories();
          get_unique_brands();
          
          // $ip = getIPAddress();  
          // echo 'User Real IP Address - '.$ip;  
        ?>
      </div>
    </div>
    <div class="col-md-2 bg-secondary p-0">
      <!-- sidebar -->
      <!-- Delivery Brands -->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h5>Delivery Brands</h5></a>
        </li>

        <?php
          // calling brands sidebar
          getbrands();
        ?>
      </ul>
      <!-- Catagories Brands -->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h5>Catagories</h5></a>
        </li>
        <?php
          // calling brands sidebar
          getcatagories();
        ?>
      </ul>

    </div>
  </div>










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