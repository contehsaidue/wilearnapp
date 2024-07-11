<?php
session_start();
require '../includes/config.php';

// insert post 
if(isset($_POST['publish'])){
    $userid = $_POST['userid'];
    $photoname = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "../assets/articleimages/".$photoname; // storing image path to folder in root directory
    $folderdb = "../assets/articleimages/".$photoname; // storing image path into database
    $post_title = $_POST['post_title'];
    $post_body = $_POST['post_body'];
    $date = date("Y-m-d");
    move_uploaded_file($tempname, $folder);

    $sql ="INSERT INTO tblpostarticle (userid,image,title,body,date_published) 
        VALUES ('$userid','$folderdb','$post_title','$post_body','$date')";
    
    if(mysqli_query($conn, $sql)){
        $_SESSION['insertmsg'] = "Feed Posted Successfully!";
        header("Location:user-write-post.php");
    }
    else{
        $_SESSION['insertmsg'] = "Failed to post article!";
        header("Location:user-write-post.php");
    }
}

// edit post

if(isset($_GET['editpost'])){
    $id = $_GET['editpost'];

    $feedseditquery = "SELECT * FROM tblpostarticle WHERE postid = '$id'";
    $runfeedseditquery = mysqli_query($conn, $feedseditquery);
    $row = mysqli_fetch_assoc($runfeedseditquery);

    $_SESSION['postid'] = $row['postid'];
    $_SESSION['image'] = $row['image'];
    $_SESSION['title'] = $row['title'];
    $_SESSION['body'] = $row['body'];

    header("Location:user-edit-post.php");
    
}

// update post

if(isset($_POST['updatepost'])){
    $postid = $_POST['postid'];
    $userid = $_POST['userid'];
    $photoname = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "../assets/articleimages/".$photoname; // storing image path to folder in root directory
    $folderdb = "../assets/articleimages/".$photoname; // storing image path into database
    $post_title = $_POST['post_title'];
    $post_body = $_POST['post_body'];
    $date = date("Y-m-d");
    move_uploaded_file($tempname, $folder);
    $feedsupdatequery = "UPDATE tblpostarticle SET image = '$folderdb',
                                                     title = '$post_title',
                                                     body = '$post_body',
                                                     date_published = '$date'
                                                     WHERE postid = '$postid'";
        if(mysqli_query($conn, $feedsupdatequery)){
            $_SESSION['updatemsg'] = "Feed Updated Successfully!";
            header("Location:user-edit-post.php");
        }
        else{
            $_SESSION['updatemsg'] = "Failed to update feed!";
            header("Location:user-edit-post.php");
        }


}

// delete post

if(isset($_GET['deletepost'])){
    $postid = $_GET['deletepost'];
    $feedsdeletequery = "DELETE FROM tblpostarticle WHERE postid = '$postid'";

        if(mysqli_query($conn, $feedsdeletequery)){
            $_SESSION['deletemsg'] = "Feed deleted Successfully!";
            header("Location:user-edit-post.php");
        }
        else{
            $_SESSION['deletemsg']  = "Failed to delete feed!";
            header("Location:user-edit-post.php");
        }


}


?>

