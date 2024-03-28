<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DORM - Find Student Accommodation</title>
    <link rel="stylesheet" href="styles.css">
   <style> 
        .login-btn {
    padding: 8px 16px;
    background-color: #3554dc;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
}

.login-btn:hover {
    background-color: #b2bec3;
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
                    <a href="index.php">
                    <img src="logo2.png"></a>
                </div>
                <div class="navbar">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>&nbsp;&nbsp;
                    <!-- Add the profile icon with a link to the login page -->
                    <div class="profile-icon">
                        <!-- Assuming you have an icon named "profile.png" -->  
                        <img src="profile.jpg" alt="Profile">
                        <span>Profile</span>&nbsp;&nbsp;
                        <a href="loginform.php" class="login-btn">Login</a>
                    </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>