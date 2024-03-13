<?php
    @include 'config.php';
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password =md5($_POST['password']);
        $cpassword =md5($_POST['cpassword']);
        $user_type =$_POST['user_type'];

        $select_user = "SELECT * FROM user_form WHERE email = '$email' && password = '$password'";
        $result = mysqli_query($conn, $select_user);

        if(mysqli_num_rows($result) > 0){
            $error[] = '-user already exist!-';
        }else{
            if($password != $cpassword){
                $error[] = '-password not matched!-';
            }else{
                $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name', '$email',
                 '$password', '$user_type')";
                if(mysqli_query($conn, $insert)){
                    echo '<script>alert("Registered Successfully-Now you can proceed to login");</script>';
                    header('Refresh:0; URL=loginform.php'); // Redirect after the popup is closed
                    exit();
            }else{
                $error[] = '-registration failed!-';
            }
        }
        }
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
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
            <img src="logo2.png">
        
            <h3>Registration Form</h3>
            <div class="input-field">
                <p>Your Name :<sup>*</sup></p>
                <input type="text" name="name" required placeholder="Enter Your Name">
            </div>
            <div class="input-field">
                <p>Your Email :<sup>*</sup></p>
                <input type="email" name="email" required placeholder="Enter Your Email">
            </div>
            <div class="input-field">
                <p>Your Password :<sup>*</sup></p>
                <input type="password" name="password" required placeholder="Enter Your Password">
            </div>
            <div class="input-field">
                <p>Confirm Password :<sup>*</sup></p>
                <input type="password" name="cpassword" required placeholder="Confirm Your Password">
            </div>
            <div class="input-field">
                <p>User Type :<sup>*</sup></p>
                <select name="user_type">
                    <option value="user">User</option>
                    <option value="owner">Owner</option>
                </select>
            </div>
            <input type="submit" name="submit" value="Register Now" class="form-btn">
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            }
            ?>
            <p>Already have an account? <a href="loginform.php">Login Now</a></p>
        </form>


    </div>

</body>
</html>