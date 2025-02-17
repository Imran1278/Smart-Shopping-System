<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_products'])){
        $products_title=$_POST['products_title'];
        $products_description=$_POST['products_description'];
        $products_keyword=$_POST['products_keyword'];
        $products_catagories=$_POST['products_catagories'];
        $products_brands=$_POST['products_brands'];
        $products_price=$_POST['products_price'];
        $products_status='true';

        
        $products_image1=$_FILES['products_image1']['name'];
        $products_image2=$_FILES['products_image2']['name'];
        $products_image3=$_FILES['products_image3']['name'];

    
        $temp_image1=$_FILES['products_image1']['tmp_name'];
        $temp_image2=$_FILES['products_image2']['tmp_name'];
        $temp_image3=$_FILES['products_image3']['tmp_name'];
        
        if($products_title=='' or $products_description=='' or $products_keyword=='' or $products_catagories==''
        or $products_brands=='' or $products_image1=='' or $products_image2=='' or $products_image3=='' ){
            echo "<script>alert('Please Fill all the available fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./products_images/$products_image1");
            move_uploaded_file($temp_image2,"./products_images/$products_image2");
            move_uploaded_file($temp_image3,"./products_images/$products_image3");

            $insert_products="insert into `products` (products_title,products_description,products_keyword,catagories_id,brands_id,
            products_image1,products_image2,products_image3,products_price,date,status) values ('$products_title','$products_description',
            '$products_keyword','$products_catagories','$products_brands','$products_image1','$products_image2','$products_image3',
            '$products_price',NOW(),'$products_status')";
            $result_query=mysqli_query($con,$insert_products);
            if($result_query){
                echo "<script>alert('SuccessFully Inserted The Products')</script>";
            }
        }
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!-- Css Link -->
    <link rel="stylesheet" href="./style.css">
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awsome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"></link>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Title -->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="products_title" class="form label">Products Title</label>
                <input type="text" name="products_title" id="products_title" class="form-control" placeholder="Enter Products Title" autocomplete="off" required="required">
            </div>
            <!-- Description -->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="products_description" class="form label">Products Description</label>
                <input type="text" name="products_description" id="products_description" class="form-control" placeholder="Enter Products Description" autocomplete="off" required="required">
            </div>
            <!-- Keyword -->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="products_keyword" class="form label">Products Keywords</label>
                <input type="text" name="products_keyword" id="products_keyword" class="form-control" placeholder="Enter Products Keywords" autocomplete="off" required="required">
            </div>
            <!-- Catagories -->
            <div class="form outline mb-4 w-50 m-auto">
                <select name="products_catagories" id="" class="form-select">
                    <option value="">Select A Catagories</option>
                    <?php
                        $select_query="Select * from `catagories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query))
                        {
                            $catagories_title=$row['catagories_title'];
                            $catagories_id=$row['catagories_id'];
                            echo "<option value='$catagories_id'>$catagories_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- Brands -->
            <div class="form outline mb-4 w-50 m-auto">
                <select name="products_brands" id="" class="form-select">
                    <option value="">Select A Brands</option>
                    <?php
                        $select_query="Select * from `brands`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query))
                        {
                            $brands_title=$row['brands_title'];
                            $brands_id=$row['brands_id'];
                            echo "<option value='$brands_id'>$brands_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="products_image1" class="form label">Products Image 1</label>
                <input type="file" name="products_image1" id="products_image1" class="form-control" required="required">
            </div>
            <!-- Image 2-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="products_image2" class="form label">Products Image 2</label>
                <input type="file" name="products_image2" id="products_image2" class="form-control" required="required">
            </div>
            <!-- Image 3-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="products_image3" class="form label">Products Image 3</label>
                <input type="file" name="products_image3" id="products_image3" class="form-control" required="required">
            </div>
            <!-- Price -->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="products_price" class="form label">Products Price</label>
                <input type="text" name="products_price" id="products_price" class="form-control" placeholder="Enter Products Price" autocomplete="off" required="required">
            </div>
            <!-- button -->
            <div class="form outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_products" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
    
</body>
</html>