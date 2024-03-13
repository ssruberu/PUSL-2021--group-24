<?php

    include 'config.php';

    //echo "Delete page";
    //check id and image value is set or not
    if(isset($_GET['id']) && isset($_GET['image'])){
        //echo "Get value and delete";
        $id = $_GET['id'];
        $image = $_GET['image'];

        //remove image
        if($image!=""){
            $path = "./images/".$image;
            $remove = unlink($path);

            if($remove==false){
                $_SESSION['remove'] = "<div class='error'>Failed to remove image.</div>";
                header('location:viewpost.php');
                die();
            }
        }
        //delete from database
        $sql = "DELETE FROM createpost WHERE id=$id";

        //execute query
        $res = mysqli_query($conn, $sql);

        //check if query is executed
        if($res==true){
            $_SESSION['delete']="<div class='success'>Post deleted successfully. </div>";
            header('location:viewpost.php');
        }else{
            $_SESSION['delete'] = "<div class='error'>Failed to delete post.</div>";
            header('location:viewpost.php'); 
        }

        }
    else{
        //go back to viewpost
        header('location:viewpost.php');

    }
?>