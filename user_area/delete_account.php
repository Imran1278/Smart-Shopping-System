<?php
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="Delete from `user_table` where username='$username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account Deleted Successful')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">  <!-- Fixed the typo 'entype' to 'enctype' -->
        <div class="form-outline mb-4">
            <input type="submit" class="form-control m-auto w-50" value="Delete Your Account" name="delete">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control m-auto w-50" value="Don't Delete Your Account"  name="dont_delete">
        </div>
    </form>
</body>
</html>