<?php
// Inckudes connect php
// include('./includes/connect.php');
// getting products
function getproducts()
{
    global $con;
    // condition to check isset or not
    if(!isset($_GET['catagories'])){
        if(!isset($_GET['brands'])){
    $select_query="Select * from `products` order by rand() LIMIT 0,9";
        $result_query=mysqli_query($con,$select_query);
          // $row=mysqli_fetch_assoc($result_query);
          // echo $row['products_title'];
        while($row=mysqli_fetch_assoc($result_query))
        {
            $products_id=$row['products_id'];
            $products_title=$row['products_title'];
            $products_description=$row['products_description'];
            $products_image1=$row['products_image1'];
            $products_price=$row['products_price'];
            $catagories_id=$row['catagories_id'];
            $brands_id=$row['brands_id'];
            // echo $products_title;
            // echo "<br>";
            echo "<div class='col-md-4 mb-2'>
            <div class='card' style='width: 18rem;'>
            <img src='./admin_area/products_images/$products_image1' class='card-img-top' alt='$products_title'>
            <div class='card-body'>
                <h5 class='card-title'>$products_title</h5>
                <p class='card-text'>$products_description</p>
                <p class='card-text'>Price: $products_price/-</p>
                <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add To Cart</a>
                <a href='products_details.php?products_id=$products_id' class='btn btn-secondary'>Veiw More</a>
            </div>
            </div>
        </div>";
        }
}
}
}

// getting all products
function get_all_products()
{
    global $con;
    // condition to check isset or not
    if(!isset($_GET['catagories'])){
        if(!isset($_GET['brands'])){
    $select_query="Select * from `products` order by rand()";
        $result_query=mysqli_query($con,$select_query);
          // $row=mysqli_fetch_assoc($result_query);
          // echo $row['products_title'];
        while($row=mysqli_fetch_assoc($result_query))
        {
            $products_id=$row['products_id'];
            $products_title=$row['products_title'];
            $products_description=$row['products_description'];
            $products_image1=$row['products_image1'];
            $products_price=$row['products_price'];
            $catagories_id=$row['catagories_id'];
            $brands_id=$row['brands_id'];
            // echo $products_title;
            // echo "<br>";
            echo "<div class='col-md-4 mb-2'>
            <div class='card' style='width: 18rem;'>
            <img src='./admin_area/products_images/$products_image1' class='card-img-top' alt='$products_title'>
            <div class='card-body'>
                <h5 class='card-title'>$products_title</h5>
                <p class='card-text'>$products_description</p>
                <p class='card-text'>Price: $products_price/-</p>
                <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add To Cart</a>
                <a href='products_details.php?products_id=$products_id' class='btn btn-secondary'>Veiw More</a>
            </div>
            </div>
        </div>";
        }
}
}
}



// getting unique catagories
function get_unique_catagories()
{
    global $con;
    // condition to check isset or not
    if(isset($_GET['catagories'])){
        $catagories_id=$_GET['catagories'];
    $select_query="Select * from `products` where catagories_id=$catagories_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No Stock For This Catagories</h2>";
        }
          // $row=mysqli_fetch_assoc($result_query);
          // echo $row['products_title'];
        while($row=mysqli_fetch_assoc($result_query))
        {
            $products_id=$row['products_id'];
            $products_title=$row['products_title'];
            $products_description=$row['products_description'];
            $products_image1=$row['products_image1'];
            $products_price=$row['products_price'];
            $catagories_id=$row['catagories_id'];
            $brands_id=$row['brands_id'];
            // echo $products_title;
            // echo "<br>";
            echo "<div class='col-md-4 mb-2'>
            <div class='card' style='width: 18rem;'>
            <img src='./admin_area/products_images/$products_image1' class='card-img-top' alt='$products_title'>
            <div class='card-body'>
                <h5 class='card-title'>$products_title</h5>
                <p class='card-text'>$products_description</p>
                <p class='card-text'>Price: $products_price/-</p>
                <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add To Cart</a>
                <a href='products_details.php?products_id=$products_id' class='btn btn-secondary'>Veiw More</a>
            </div>
            </div>
        </div>";
        }
}
}


// getting unique brands
function get_unique_brands()
{
    global $con;
    // condition to check isset or not
    if(isset($_GET['brands'])){
        $brands_id=$_GET['brands'];
    $select_query="Select * from `products` where brands_id=$brands_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>This Brands is not available for this service</h2>";
        }
          // $row=mysqli_fetch_assoc($result_query);
          // echo $row['products_title'];
        while($row=mysqli_fetch_assoc($result_query))
        {
            $products_id=$row['products_id'];
            $products_title=$row['products_title'];
            $products_description=$row['products_description'];
            $products_image1=$row['products_image1'];
            $products_price=$row['products_price'];
            $catagories_id=$row['catagories_id'];
            $brands_id=$row['brands_id'];
            // echo $products_title;
            // echo "<br>";
            echo "<div class='col-md-4 mb-2'>
            <div class='card' style='width: 18rem;'>
            <img src='./admin_area/products_images/$products_image1' class='card-img-top' alt='$products_title'>
            <div class='card-body'>
                <h5 class='card-title'>$products_title</h5>
                <p class='card-text'>$products_description</p>
                <p class='card-text'>Price: $products_price/-</p>
                <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add To Cart</a>
                <a href='products_details.php?products_id=$products_id' class='btn btn-secondary'>Veiw More</a>
            </div>
            </div>
        </div>";
        }
}
}







// Insert Brands Inside sidebar
function getbrands()
{
    global $con;
    $select_brands="Select * from `brands`";
        $result_brands=mysqli_query($con,$select_brands);
        while($row_data=mysqli_fetch_assoc($result_brands))
        {
            $brands_title= $row_data['brands_title'];
            $brands_id= $row_data['brands_id'];
            echo "<li class='nav-item'><a href='index.php?brands=$brands_id' class='nav-link text-light'>$brands_title</a></li>";
        }

}
// Insert Catagories Inside sidebar
function getcatagories()
{
    global $con;
    $select_catagories="Select * from `catagories`";
        $result_catagories=mysqli_query($con,$select_catagories);
        while($row_data=mysqli_fetch_assoc($result_catagories))
        {
            $catagories_title= $row_data['catagories_title'];
            $catagories_id= $row_data['catagories_id'];
            echo "<li class='nav-item'><a href='index.php?catagories=$catagories_id' class='nav-link text-light'>$catagories_title</a></li>";
        }

}

// searching products data
function search_products()
{
    global $con;
    if(isset($_GET['search_data_products']))
    {
        $search_data_value=$_GET['search_data'];
            $search_query="Select * from `products` where products_keyword like '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No Result Match, No Products Found On This Catagories!</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query))
        {
            $products_id=$row['products_id'];
            $products_title=$row['products_title'];
            $products_description=$row['products_description'];
            $products_image1=$row['products_image1'];
            $products_price=$row['products_price'];
            $catagories_id=$row['catagories_id'];
            $brands_id=$row['brands_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card' style='width: 18rem;'>
            <img src='./admin_area/products_images/$products_image1' class='card-img-top' alt='$products_title'>
            <div class='card-body'>
                <h5 class='card-title'>$products_title</h5>
                <p class='card-text'>$products_description</p>
                <p class='card-text'>Price: $products_price/-</p>
                <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add To Cart</a>
                <a href='products_details.php?products_id=$products_id' class='btn btn-secondary'>Veiw More</a>
            </div>
            </div>
            </div>";
        }
    }
}


// veiw Deatil function
function veiw_details(){
    global $con;
    // condition to check isset or not
    if(isset($_GET['products_id'])){
    if(!isset($_GET['catagories'])){
        if(!isset($_GET['brands'])){
            $products_id=$_GET['products_id'];
    $select_query="Select * from `products` where products_id=$products_id";
        $result_query=mysqli_query($con,$select_query);
          // $row=mysqli_fetch_assoc($result_query);
          // echo $row['products_title'];
        while($row=mysqli_fetch_assoc($result_query))
        {
            $products_id=$row['products_id'];
            $products_title=$row['products_title'];
            $products_description=$row['products_description'];
            $products_image1=$row['products_image1'];
            $products_image2=$row['products_image2'];
            $products_image3=$row['products_image3'];
            $products_price=$row['products_price'];
            $catagories_id=$row['catagories_id'];
            $brands_id=$row['brands_id'];
            // echo $products_title;
            // echo "<br>";
            echo "<div class='col-md-4 mb-2'>
            <div class='card' style='width: 18rem;'>
            <img src='./admin_area/products_images/$products_image1' class='card-img-top' alt='$products_title'>
            <div class='card-body'>
                <h5 class='card-title'>$products_title</h5>
                <p class='card-text'>$products_description</p>
                <p class='card-text'>Price: $products_price/-</p>
                <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add To Cart</a>
                <a href='index.php' class='btn btn-secondary'>Go Home</a>
            </div>
            </div>
        </div>
        <div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Products</h4>
                </div>
                <div class='col-md-6'>
                    <img src='./admin_area/products_images/$products_image2' class='card-img-top' alt='$products_title'>
                </div>
                <div class='col-md-6'>
                    <img src='./admin_area/products_images/$products_image3' class='card-img-top' alt='$products_title'>
                </div>
            </div>
        </div>";
        }
}
}
}
}


// Get ip address function
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



// Cart Function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add= getIpAddress();
        $get_products_id=$_GET['add_to_cart'];
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and 
        products_id=$get_products_id";
        // $result_query=mysqli_query($con,$select_query);
        // chatgpt help
        $result_query = mysqli_query($con, $select_query);          
        // Check if query succeeded
        if (!$result_query) 
        {
            die("Query Failed: " . mysqli_error($con));
        }
            // Now, you can safely use mysqli_num_rows
            $num_of_rows = mysqli_num_rows($result_query); 
        // $num_of_rows=mysqli_num_rows($result_query); 
        if($num_of_rows>0){
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query="insert into `cart_details` (products_id,ip_address,quantity) values ($get_products_id,'$get_ip_add',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// Function to display cart item numbers
function cart_items()
{
    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $get_ip_add= getIpAddress();
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);          
        // Check if query succeeded
        if (!$result_query) 
        {
            die("Query Failed: " . mysqli_error($con));
        }
            // Now, you can safely use mysqli_num_rows
            $count_cart_items = mysqli_num_rows($result_query); 
    
    }else
    {
            global $con;
        $get_ip_add= getIpAddress();
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);          
        // Check if query succeeded
        if (!$result_query) 
        {
            die("Query Failed: " . mysqli_error($con));
        }
            // Now, you can safely use mysqli_num_rows
            $count_cart_items = mysqli_num_rows($result_query); 
    }
    echo $count_cart_items;
}

// Total cart price
function total_cart_price()
{
    global $con;
    $get_ip_add= getIpAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result))
    {
        $products_id=$row['products_id'];
        $select_products="Select * from `products` where products_id='$products_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_products_price=mysqli_fetch_array($result_products))
        {
            $products_price=array($row_products_price['products_price']);
            $products_values=array_sum($products_price);
            $total_price+=$products_values;
        }
    }
    echo $total_price;
}


// getting user order details
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You Have <span class='text-danger'>$row_count</span> Pending Orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    }else{
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You Have Zero Pending Orders</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
                    }
                }
            }

        }
    }
}
?>













