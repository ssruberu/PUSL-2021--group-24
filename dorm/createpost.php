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
    <h1>Create A New Post</h1>

    <?php
    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }  
    ?>
    



    <form action="#" method="post" enctype="multipart/form-data">
        <table class="form-table">
            <tr>
                <td>Title :</td>
                <td>
                    <input type="text" name="title" class="form-input" placeholder="Title of the Post">
                </td>
            </tr>
            <tr>
                <td>Select Image :</td>
                <td>
                    <input type="file" name="image" class="form-input">
                </td>
            </tr>
            <tr>
                <td>City :</td>
                <td>
                    <select name="city" class="form-input">
                        <option value="1">Homagama</option>
                        <option value="2">Malambe</option>
                        <option value="3">Colombo</option>
                        <option value="4">Rathmalana</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Address :</td>
                <td>
                    <input type="text" name="address" class="form-input" placeholder="Enter the Address">
                </td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>
                    <input type="email" name="email" class="form-input" placeholder="Enter owner Email">
                </td>
            </tr>
            <tr>
                <td>Description :</td>
                <td>
                    <textarea name="description" class="form-input" rows="5" placeholder="Enter the Description"></textarea>
                </td>
            </tr>
            <tr>
                <td>Number of Students :</td>
                <td>
                    <input type="number" name="no_of_students" class="form-input" placeholder="Enter the No. of Students">
                </td>
            </tr>
            <tr>
                <td>Active Status :</td>
                <td>
                    <input type="radio" value="Yes" name="active">Yes
                    <input type="radio" value="No" name="active">No
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                <input type="reset" value="Clear" class="form-reset">
                    <input type="submit" name="submit" value="Create Post" class="form-submit">
                    
                </td>                
            </tr>
        </table>
    </form>



    <?php
     if(isset($_POST['submit'])){
        //adding to the database
        $title=$_POST['title'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $description=$_POST['description'];
        $no_of_students=$_POST['no_of_students'];
       

        //active status
        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }else{
            $active="No";
        }
        
        //image
        if(isset($_FILES['image']['name'])){
            $image=$_FILES['image']['name'];

            if($image!=""){
            //upload image-source path

            $src=$_FILES['image']['tmp_name'];

            //destination path
            $dst="images/".$image;

            //upload image(move from src path to destination path)
            $upload=move_uploaded_file($src,$dst);

            //check if upload is successful
            if($upload==false){
                $_SESSION['upload']="<div class='error'>Failed to upload image. </div>";
                header('location:createpost.php');
                die("Failed to upload image");
            }
            
            }
        }else{
            $image="";
        }

        //insert into database
        $sql2="INSERT INTO createpost SET
        title='$title',
        city='$city',
        address='$address',
        email='$email',
        description='$description',
        no_of_students= $no_of_students,
        image='$image',
        active='$active'
        ";

        //execute query
        $res2=mysqli_query($conn,$sql2);

        //check if query is executed
        if($res2==true){
            $_SESSION['add']="<div class='success'>Post created successfully. </div>";
            header('location:viewpost.php');
        }else{
            $_SESSION['add']="<div class='error'>Failed to create post. </div>";
            header('location:createpost.php');
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
