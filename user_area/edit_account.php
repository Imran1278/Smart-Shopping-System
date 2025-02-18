<?php

if(isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $user_session_name = mysqli_real_escape_string($con, $user_session_name);
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    if(!$result_query) {
        die('Query failed: ' . mysqli_error($con));
    }
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
    $user_image = $row_fetch['user_image'];  
}
// Upadte Query
if(isset($_POST['user_update'])) {
    // Sanitize the POST data
    $update_id = $user_id;
    $username = mysqli_real_escape_string($con, $_POST['user_username']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_address = mysqli_real_escape_string($con, $_POST['user_address']);
    $user_mobile = mysqli_real_escape_string($con, $_POST['user_number']);
    $user_image = $_FILES['user_image']['name'];
    if($user_image) {
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp, "./users_images/$user_image");
    } else {
        $user_image = $row_fetch['user_image'];  // Keep the existing image if no new one is uploaded
    }
    
    // Update query
    $update_data = "UPDATE `user_table` SET username='$username', user_email='$user_email', user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$update_id";
    $result_query_update = mysqli_query($con, $update_data);
    
    // Check if update was successful
    if($result_query_update) {
        echo "<script>alert('Data updated successfully');</script>";
        echo "<script>window.open('logout.php', '_self');</script>";
    } else {
        echo "<script>alert('Error updating data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">  <!-- Fixed the typo 'entype' to 'enctype' -->
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo htmlspecialchars($username); ?>" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo htmlspecialchars($user_email); ?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto ">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./users_images/<?php echo htmlspecialchars($user_image); ?>" alt="" class="edit_image">  <!-- Use correct path for the image -->
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo htmlspecialchars($user_address); ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo htmlspecialchars($user_mobile); ?>" name="user_number">
        </div>
        <input type="submit" value="Update" class="py-2 px-3 border-0 bg-info" name="user_update">
    </form>
</body>
</html>
