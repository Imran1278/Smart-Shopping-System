<?php 
    if(isset($_GET['edit_products'])){
        $edit_id=$_GET['edit_products'];
        $get_data="Select * from `products` where products_id=$edit_id";
        $result=mysqli_query($con,$get_data);
        $row=mysqli_fetch_assoc($result);
        $products_title=$row['products_title'];
        $products_description=$row['products_description'];
        $products_keyword=$row['products_keyword'];
        $catagories_id=$row['catagories_id'];
        $brands_id=$row['brands_id'];
        $products_image1=$row['products_image1'];
        $products_image2=$row['products_image2'];
        $products_image3=$row['products_image3'];
        $products_price=$row['products_price'];

        // fetching catagories name
        $select_catagory="Select * from `catagories` where catagories_id=$catagories_id";
        $result_catagory=mysqli_query($con,$select_catagory);
        $row_catagory=mysqli_fetch_assoc($result_catagory);
        $catagories_title=$row_catagory['catagories_title'];

        // fetching brands name
        $select_brands="Select * from `brands` where brands_id=$brands_id";
        $result_brands=mysqli_query($con,$select_brands);
        $row_brands=mysqli_fetch_assoc($result_brands);
        $brands_title=$row_brands['brands_title'];
        
    }


?>

<div class="container mt-5">
    <h3 class="text-center text-success">Edit Products</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-action w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" value="<?php echo $products_title?>" class="form-control" required="required">
        </div>
        <div class="form-action w-50 m-auto mb-4">
            <label for="product_description" class="form-label" >Product Description</label>
            <input type="text" id="product_description" name="product_description" value="<?php echo $products_description ?>" class="form-control" required="required">
        </div>
        <div class="form-action w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label" >Product Keyword</label>
            <input type="text" id="product_keyword" value="<?php echo $products_keyword ?>" name="product_keyword" class="form-control" required="required">
        </div>
        <div class="form-action w-50 m-auto mb-4">
        <label for="product_kcatagory" class="form-label">Product Catagories</label>
            <select name="product_catagory" class="form-select">
                <option value="<?php echo $catagories_title?>"><?php echo $catagories_title ?></option>
                <?php
                        $select_catagory_all="Select * from `catagories`";
                        $result_catagory_all=mysqli_query($con,$select_catagory_all);
                        while($row_catagory_all=mysqli_fetch_assoc($result_catagory_all)){
                            $catagories_title=$row_catagory_all['catagories_title'];
                            $catagories_id=$row_catagory_all['catagories_id'];
                            echo "<option value='$catagories_id'>$catagories_title</option>";
                        }
                ?>
            </select>
        </div>
        <div class="form-action w-50 m-auto mb-4">
        <label for="product_brand" class="form-label">Product Brands</label>
            <select name="product_brand" class="form-select">
                <option value="<?php echo $brands_title?>"><?php echo $brands_title ?></option>
                <?php
                    $select_brands_all="Select * from `brands`";
                    $result_brands_all=mysqli_query($con,$select_brands_all);
                    while($row_brands_all=mysqli_fetch_assoc($result_brands_all)){
                        $brands_title=$row_brands_all['brands_title'];
                        $brands_id=$row_brands_all['brands_id'];
                        echo "<option value='$brands_id'>$brands_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-action w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
            <img src="./products_images/<?php echo $products_image1  ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-action w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
            <img src="./products_images/<?php echo $products_image2  ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-action w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
            <img src="./products_images/<?php echo $products_image3  ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-action w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" value="<?php echo $products_price ?>" class="form-control" required="required">
        </div>
        <br>
        <div class="mb-4 w-50 m-auto">
                <input type="submit" name="edit_products" class="btn btn-info mb-3 px-3" value="Update Products">
            </div>

    </form>
</div>

<!--  Editing products -->
<?php
    if(isset($_POST['edit_products'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keyword=$_POST['product_keyword'];
        $product_catagory=$_POST['product_catagory'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];

        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];

        // checking filds empty or not
        if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_catagory=='' or $product_brand==''
        or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_price==''){
            echo "<script>alert('Please Fill All The Fileds And Continue The Process')</script>";
        }else{
            move_uploaded_file($temp_image1,"./products_images/$product_image1");
            move_uploaded_file($temp_image2,"./products_images/$product_image2");
            move_uploaded_file($temp_image3,"./products_images/$product_image3");

            // Query To update products
            $update_products="update `products` set product_title='$product_title', product_description='$product_description',
            product_keyword='$product_keyword', catagories_id='$product_catagory' , brands_id='$product_brand',
            product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',
            product_price='$product_price',date=NOW() where products_id=$edit_id";
            $result_update=mysqli_query($con,$update_products);
            if($result_update){
                echo "<script>alert('Products Update Successfully')</script>";
                echo "<script>window_open('./insert_products.php', '_self')</script>";
            }
        }
    }

?>


