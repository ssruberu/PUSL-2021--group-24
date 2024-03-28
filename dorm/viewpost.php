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

        <style>
.btn-add {
    display: inline-block;
    padding: 10px 20px;
    background-color: #778ca3;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-bottom: 30px;
    margin-right: 1000px;
}

.btn-add:hover {
    background-color: #4b6584;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #f7f7f7;
}

.btn-edit, .btn-delete {
    display: inline-block;
    padding: 5px 10px;
    margin: 0 5px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.btn-delete {
    background-color: #e74c3c;
}

.btn-edit:hover, .btn-delete:hover {
    background-color: #2980b9;
}

.error{
    color: red;
}

</style>
    </header>

    
    <main>
    <h1>Manage Posts</h1>

    <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);                
        }

        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);                
        }

        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
    ?>
    <a href="createpost.php" class="btn-add">Add New Post</a>
    <table>
        <tr>
            <th>Post ID</th>
            <th>Title</th>
            <th>City</th>
            <th>Address</th>
            <th>Image</th>
            <th>Description</th>
            <th>No. of Students</th>
            <th>Active Status</th>
            <th>Action</th>
        </tr>

        <?php
            $sql = "SELECT * FROM createpost";

            $res = mysqli_query($conn, $sql);

            //to get the count
            $count=mysqli_num_rows($res);

            //create post number
            $pn=1;

            //check if there is data in database
            if($count>0){
                while($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $city = $row['city'];
                    $address = $row['address'];
                    $image = $row['image'];
                    $description = $row['description'];
                    $no_of_students = $row['no_of_students'];
                    $active = $row['active'];

                    ?>
                    <tr>
                        <td><?php echo $pn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $city; ?></td>
                        <td><?php echo $address; ?></td>

                        <td>
                            <?php
                                if($image!=""){
                                    ?>
                                    <img src="images/<?php echo $image; ?>" width="100px">
                                    <?php
                                }else{
                                    echo "<div class='error'>Image not added</div>";
                                }
                            ?>
                        </td>

                        <td><?php echo $description; ?></td>
                        <td><?php echo $no_of_students; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="#" class="btn-edit">Edit</a>
                            <a href="deletepost.php?id=<?php echo $id; ?>&image=<?php echo $image; ?>" class="btn-delete">Delete</a>
                        </td>
                    </tr>

                    <?php
                }

            }else{
                //if we do not have data
                ?>
                <tr>
                    <td colspan="9"><div class="error">No Post Added</div></td>
                </tr>
                <?php
            }
        ?>

        
    </table>
</main>









    <footer>
        <p>&copy; 2024 DORM - All rights reserved</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
