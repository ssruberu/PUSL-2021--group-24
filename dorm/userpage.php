<?php
    @include 'config.php';
    session_start();

    if(!isset($_SESSION['user_name'])){
        header('location:loginform.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DORM - Find Student Accommodation</title>
    <link rel="stylesheet" href="styles.css">
   <style> 
        .logout-btn {
    padding: 8px 16px;
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.logout-btn:hover {
    background-color: #c82333;
}

.profile-icon {
    display: flex;
    align-items: center;
}

.profile-icon img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 2px solid #fff;
    margin-right: 10px;
    transition: border-color 0.3s ease;
}

.profile-icon img:hover {
    border-color: #007bff;
}

.profile-icon span {
    color: #fff;
    margin-right: 10px;
}
</style>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <a href="index.html">
                    <img src="logo2.png"></a>
                </div>
                <div class="navbar">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                    </ul>
                    <!-- Add the profile icon with a link to the login page -->
                    <div class="profile-icon">
                        <!-- Assuming you have an icon named "profile.png" -->  
                        <img src="profile.jpg" alt="Profile">
                        <span><?php echo $_SESSION['user_name'] ?></span>
                        <form action="logout.php" method="post">
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    
    <main>
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Enter university name">
            <button onclick="search()">Search</button>
        </div>
        <div id="results">
            <!-- Search results will be displayed here -->
        </div>
    </main>
    <footer>
        <p>&copy; 2024 DORM - All rights reserved</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
