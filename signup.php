<?php
    include("connect.php");

    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $select_statement = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";
        $select_query = mysqli_query($conn, $select_statement);

        if(mysqli_num_rows($select_query) > 0 ){
            die("Username already taken ...");
            // header("location: home.php");
        }else{
            $insert_statement = "INSERT INTO admin(admin_username,admin_password) VALUES ('$username', '$password')";
            $insert_query = mysqli_query($conn, $insert_statement);
            if($insert_query){
                header("location: login.php");
            }else{
                die("Can't perfom action");
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
    <title>Signup page</title>
</head>
<body>
    <div class="all">
        <div class="container">
            <h2>Sign up form</h2>
            <form action="" method="post">
                <div class="form_card">
                    <h3>Username: </h3>
                    <input type="text" name="username" required>
                </div>
                <div class="form_card">
                    <h3>Password: </h3>
                    <input type="password" name="password" required>
                </div>
                <button class="submit" name="signup">Sign up</button>
                <p>Already have an account? <a href="login.php">Login up</a></p>
            </form>
        </div>
    </div>
</body>
</html>