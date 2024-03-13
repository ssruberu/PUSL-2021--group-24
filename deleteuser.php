<?php
    session_start();
    include 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM user_form WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res) {
            $_SESSION['delete'] = "<div class='success'>User deleted successfully.</div>";
        } else {
            $_SESSION['delete'] = "<div class='error'>Failed to delete user.</div>";
        }
    } else {
        $_SESSION['delete'] = "<div class='error'>User ID not provided.</div>";
    }

    header('location: adminpage.php');
    exit;
?>
