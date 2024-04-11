<?php
include('admin/config/dbcom.php');



if(isset($_POST['c_submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $web = $_POST['website'];
    $mess = $_POST['mess'];
    $post_id = $_POST['post_id'];
    $post_slug = $_POST['post_slug'];

    $comment = "INSERT INTO comment (name, email, website, mess, post_id) VALUES ('$name', '$email', '$web', '$mess', '$post_id')";

    $comment_run = mysqli_query($con, $comment);
    
    if($comment_run)
    {
        $_SESSION['message'] = "Comment Add Successfully!";
        header('Location: post.php?title='.$post_slug);
        exit(0);
    }
    else {
        $_SESSION['message'] = "Sometthing wrong!";
        header('Location: index.php');
        exit(0);
    }

}

?>
