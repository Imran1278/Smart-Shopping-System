<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $get_products="Select * from `products`";
            $result=mysqli_query($con,$get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $products_id=$row['products_id'];
                $products_title=$row['products_title'];
                $products_image1=$row['products_image1'];
                $products_price=$row['products_price'];
                $status=$row['status'];
                $number++;
                ?>
                <tr class='text-center'>
                <td><?php echo $number; ?></td>
                <td><?php echo $products_title; ?></td>
                <td><img src='./products_images/<?php echo $products_image1; ?>' class='product_img'/></td>
                <td><?php echo $products_price; ?>/-</td>
                <td><?php
                $get_count="Select * from `orders_pending` where products_id=$products_id";
                $result_count=mysqli_query($con,$get_count);
                $row_count=mysqli_num_rows($result_count);
                echo $row_count;
                ?></td>
                <td><?php echo $status; ?></td>
                <td><a href='index.php?edit_products=<?php echo $products_id?>' class='text-danger'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
            ?>
    </tbody>
</table>