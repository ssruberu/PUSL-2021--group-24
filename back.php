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

body{
    background-color: #f2f0e6;
}
</style>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <a href="userpage.php">
                    <img src="logo2.png"></a>
                </div>
                <div class="navbar">
                    <ul>
                        <li><a href="userpage.php">Home</a></li>
                        <li><a href="userabout.php">About</a></li>
                    </ul>
                    
                    <div class="profile-icon"> 
                        <img src="profile.jpg" alt="Profile">
                        <span><?php echo $_SESSION['user_name'] ?></span>&nbsp;&nbsp;&nbsp;
                        <form action="logout.php" method="post">
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    

    <main>
        <div class="heading">
            <h1>About Us</h1>
            <p>
Welcome to The DORM, your solution for finding cozy accommodations near universities. We understand the struggles of students 
in search of suitable housing, so we've created a user-friendly platform. Explore our listings for dormitories or shared 
apartments that match your preferences effortlessly. Let us enrich your university experience by helping you 
find your ideal home away from home.</p>
        </div>
        <div class="about-us">
            <section class="about">
                <div class="about-image">
                    <img src="logo1.png">
                </div>
                <div class="about-text">
                    <h2>More About Us</h2>
                    <p>From NSBM's Faculty of Computing, Team A24 proudly introduces The DORM as a project for the module 
                        PUSL2021 Computing Group Project. 
                        Designed to connect students with comfortable accommodations near universities,
                         we offer a seamless platform for both seekers and providers. Join us in simplifying 
                         the journey of finding your ideal home away from home. For more information, visit our website.</p>
                    <a href="https://www.nsbm.ac.lk/" class="learn-more">Learn More</a>
                </div>
            </section>
        </div>
    </main>

    
    <footer>
        <p>&copy; 2024 DORM - All rights reserved</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
