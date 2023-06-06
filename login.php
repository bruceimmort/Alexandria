<?php
    include("connect.php");

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $select_statement = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";
        $select_query = mysqli_query($conn, $select_statement);

        if(mysqli_num_rows($select_query) > 0 ){
            // die("User in database ...");
            header("location: home.php");
        }else{
            die("Wrong credentials ...");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body>
    <div class="all">
        <div class="container">
            <h2>Login form</h2>
            <form action="" method="post">
                <div class="form_card">
                    <h3>Username: </h3>
                    <input type="text" name="username" required="required">
                </div>
                <div class="form_card">
                    <h3>Password: </h3>
                    <input type="password" name="password" required="required">
                </div>
                <button class="submit" name="login">Login</button>
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </form>
        </div>
    </div>
</body>
</html>