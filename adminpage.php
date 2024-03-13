<?php
    session_start();
    @include 'config.php';
    

    if(!isset($_SESSION['admin_name']) || $_SESSION['admin_name'] !== 'Admin'){
        header('location:loginform.php');
        exit; 
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
                    <a href="adminpage.php">
                    <img src="logo2.png"></a>
                </div>
                <div class="navbar">
                    
                   
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
        <h1>Welcome to Admin's Dashboard</h1>
        <br>
        <?php
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);            
        }
        ?>
        <br><br>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM user_form";

            $res = mysqli_query($conn, $sql);

            //to get the count
            $count=mysqli_num_rows($res);

            //check if there is data in database
            if($count>0){
                while($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $name= $row['name'];
                    $email = $row['email'];
                    $user_type = $row['user_type'];         
                    ?>
                     <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $user_type; ?></td>
                        <td>
                            
                            <a href="deleteuser.php?id=<?php echo $id; ?>" class="btn-delete">Delete</a>
                        </td>
                    </tr>
                    <?php
                }

            }else{
                //if we do not have data
                ?>
                <tr>
                    <td colspan="9"><div class="error">No User Added</div></td>
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
