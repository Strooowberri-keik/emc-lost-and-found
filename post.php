<?php
session_start();
include('admin/dbcon.php');

    $file_tmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $post= $_POST['post'];
    $user= $_POST['post_username'];
    $loc = $_POST['location'];

    $user_post_sql = "INSERT INTO posts (create_post, image, location, post_username) VALUES ('$post', '$file_tmp','$loc','$user')";
    if (mysqli_query($jcon, $user_post_sql)) {
        $_SESSION['message'] = "Your post was successfully uploaded";
         header("Location: home.php");
    }
    else 
    {
        $_SESSION['message'] = "Image was unsuccessfully uploaded". mysqli_error($jcon);
    }

?>
