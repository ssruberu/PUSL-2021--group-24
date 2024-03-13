<?php
    @include 'config.php';
    session_start();

    if(!isset($_SESSION['owner_name'])){
        header('location:loginform.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner's Dashboard</title>
    <link rel="stylesheet" href="owner.css">
  
</head>
<body>
    <header>
        <nav>
            <div class="container-header">
                <div class="logo">
                    <a href="ownerpage.php">
                    <img src="logo2.png"></a>
                </div>
                <div class="navbar">
                    
                    <!-- Add the profile icon with a link to the login page -->
                    <div class="profile-icon">
                        <!-- Assuming you have an icon named "profile.png" -->  
                        <img src="profile.jpg" alt="Profile">
                        <span><?php echo $_SESSION['owner_name'] ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <form action="logout.php" method="post">
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    
    <main>
    <h1>Edit Your Post</h1>

    <?php
   
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //create sql to get all other details
        $sql = "SELECT * FROM createpost WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //count rows
        $count = mysqli_num_rows($res);
        if($count==1){
            //get all the data
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $current_image = $row['image'];
            $city = $row['city'];
            $address = $row['address'];
            $email= $row['email'];
            $description = $row['description'];
            $no_of_students = $row['no_of_students'];
            $active= $row['active'];

        }else{
            $_SESSION['no-post-found'] = "<div class='error'>No post found.</div>";
            echo"<script>window.location.href='viewpost.php'</script>";
        }

    }else{
        header('location:viewpost.php');
    }
    ?>
    



    <form action="#" method="post" enctype="multipart/form-data">
        <table class="form-table">
            <tr>
                <td>Title :</td>
                <td>
                    <input type="text" name="title" class="form-input" value="<?php echo $title; ?>">
                </td>
            </tr>
            <tr>
                <td>Current Image :</td>
                <td>
                    <?php
                    if($current_image!=""){
                        //display the image
                        ?>
                        <img src="images/<?php echo $current_image; ?>" width="150px">
                        <?php
                    }else{
                        //display the message
                        echo "<div class='error'>Image not added.</div>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>New Image :</td>
                <td>
                    <input type="file" name="image" class="form-input">
                </td>
            </tr>
            <tr>
                <td>City :</td>
                <td>
                    <select  name="city" class="form-input">
                        <option value="1" <?php if($city==1){echo "selected";} ?>>Homagama</option>
                        <option value="2" <?php if($city==2){echo "selected";} ?>>Malambe</option>
                        <option value="3" <?php if($city==3){echo "selected";} ?>>Colombo</option>
                        <option value="4" <?php if($city==4){echo "selected";} ?>>Rathmalana</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Address :</td>
                <td>
                    <input type="text" name="address" class="form-input" value="<?php echo $address; ?>">
                </td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>
                    <input type="email" name="email" class="form-input" value="<?php echo $email; ?>">
                </td>
            </tr>
            <tr>
                <td>Description :</td>
                <td>
                    <textarea name="description" class="form-input" rows="5" >
                         <?php echo $description; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Number of Students :</td>
                <td>
                    <input type="number" name="no_of_students" class="form-input" value="<?php echo $no_of_students; ?>">
                </td>
            </tr>
            <tr>
                <td>Active Status :</td>
                <td>
                    <input type="radio" value="Yes" name="active" <?php if($active=="Yes"){echo "checked";} ?>>Yes
                    <input type="radio" value="No" name="active"    <?php if($active=="No"){echo "checked";} ?>>No
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="reset" value="Clear" class="form-reset">
                    <input type="submit" name="submit" value="Update Post" class="form-submit">
                    
                </td>                
            </tr>
        </table>
    </form>
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $id= $_POST['id'];
                        $title = $_POST['title'];
                        $current_image = $_POST['current_image'];
                        $city = $_POST['city'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                        $description = $_POST['description'];
                        $no_of_students = $_POST['no_of_students'];
                        $active = $_POST['active'];

                        //update new image
                        if(isset($_FILES['image']['name']))
                        {
                            $image = $_FILES['image']['name'];

                            if($image!="")
                            {
                                //upload new image
                                $src=$_FILES['image']['tmp_name'];

                                //destination path
                                $dst="images/".$image;

                                //upload image(move from src path to destination path)
                                $upload=move_uploaded_file($src,$dst);

                                //check if upload is successful
                                if($upload==false)
                                {
                                    $_SESSION['upload']="<div class='error'>Failed to upload image. </div>";
                                    echo"<script>window.location.href='viewpost.php'</script>";
                                    die();
                                }
                                //remove old image
                                if($current_image!="")
                                {
                                    $remove_path="images/".$current_image;
                                    $remove=unlink($remove_path);
    
                                    //check if remove is successful
                                    if($remove==false)
                                    {
                                        $_SESSION['failed-remove']="<div class='error'>Failed to remove image. </div>";
                                        echo"<script>window.location.href='viewpost.php'</script>";
                                        die();
                                    }
                                }
                               

                            }
                            else
                            {
                                $image = $current_image;
                            }
                        }else
                            {
                                $image = $current_image;
                            }

                        //update database
                        $sql2 = "UPDATE createpost SET
                        title = '$title',
                        image = '$image',
                        city = '$city',
                        address = '$address',
                        email = '$email',
                        description = '$description',
                        no_of_students = '$no_of_students',
                        active = '$active'
                        WHERE id = $id
                        ";

                        //execute the query
                        $res2 = mysqli_query($conn, $sql2);

                        //redirect to view post
                        if($res2==true){
                            $_SESSION['update'] = "<div class='success'>Post updated successfully.</div>";
                            echo"<script>window.location.href='viewpost.php'</script>";
                        }else{
                            $_SESSION['update'] = "<div class='error'>Failed to update post.</div>";
                            echo"<script>window.location.href='viewpost.php'</script>";
                        }


                    }
                    
                    ?>
</main>









    <footer>
        <p>&copy; 2024 DORM - All rights reserved</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
