<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $catagories_title=$_POST['cat_title'];
        // Select Data From Database
        $select_query="Select * from `catagories` where catagories_title='$catagories_title'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('This catagories is present inside the database')</script>";
        }
        else{

        $insert_query="insert into `catagories` (catagories_title) values('$catagories_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Catagories has been inserted successfuly')</script>";
                    }
            }
    }
?>

<h2 class="text-center">Insert Catagories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Catagories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Catagories">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Catagories</button> -->
    </div>
</form>