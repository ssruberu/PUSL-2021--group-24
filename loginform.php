<?php
    @include 'config.php';
    session_start();
    if(isset($_POST['submit'])){
        
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password =md5($_POST['password']);
        

        $select_user = "SELECT * FROM user_form WHERE email = '$email' && password = '$password'";
        $result = mysqli_query($conn, $select_user);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            if($row['user_type'] == 'owner'){
                $_SESSION['owner_name'] = $row['name'];
                header('location:ownerpage.php');
            }elseif($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['name'];
                header('location:userpage.php');
            }elseif($email == 'admin@gmail.com' && $password == md5('admin')){ // Check if email and password are admin credentials
                $_SESSION['admin_name'] = 'Admin';
                header('location:adminpage.php'); // Redirect to admin page
            }else{
                $error[] = '-Incorrect Email or Password-';
            }
           
        }else{
            $error[] = '-Incorrect Email or Password-';
        }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyles.css">
    <style>
        .error-msg {
            color: red; /* Set error message color to red */
        }
        .form-container {
            margin-top: 10rem;
            padding-top: 5rem;
  
        }
    </style>
</head>
<body><br><br>
    <div class="form-container">
        <form action="" method="post">
            <a href="index.php">
            <img src="logo2.png"></a>
        
            <h3>Login Form</h3>
           
            <div class="input-field">
                <p>Your Email :<sup>*</sup></p>
                <input type="email" name="email" required placeholder="Enter Your Email">
            </div>
            <div class="input-field">
                <p>Your Password :<sup>*</sup></p>
                <input type="password" name="password" required placeholder="Enter Your Password">
            </div>
        
            <input type="submit" name="submit" value="Login Now" class="form-btn">
            
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            }
            ?>
            <p>Don't have an account? <a href="registerform.php">Register Now</a></p>
        </form>


    </div>

</body>
</html>