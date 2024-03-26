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
    <h1>Welcome to Owner's Dashboard</h1>
    <div class="container-card">
        <div class="card">
            <a href="createpost.php">
                <img src="createposts.png" alt="Create Post">
                <h2>Create a New Post</h2>
            </a>
        </div>

        <div class="card">
            <a href="viewpost.php">
                <img src="viewpost.png" alt="View Posts">
                <h2>View Created Posts</h2>
            </a>
        </div>
    </div>
</main>









    <footer>
        <p>&copy; 2024 DORM - All rights reserved</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
