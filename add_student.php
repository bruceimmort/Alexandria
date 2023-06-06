<?PHP
    include("connect.php");

    if(isset($_POST['signup'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $sex = $_POST['sex'];
        $class = $_POST['class'];

        $select_statement = "SELECT * FROM students_table WHERE firstname = '$firstname' AND lastname = '$lastname'";
        $insert_statement = "INSERT INTO students_table(firstname, lastname, sex, class) VALUES ('$firstname','$lastname','$sex','$class')";
        $select_query = mysqli_query($conn, $select_statement);
        $insert_query = mysqli_query($conn, $insert_statement);

        if(mysqli_num_rows($select_query) > 0 ){
            // die("Duplicated data in database ...");
            echo("<script> alert('Duplicated data in database ...')</script>");
        }else{
            if(!$insert_query){
                echo("<script> alert('Failed to insert data ...')</script>");
            }else{
                // echo("Data inserted successfully ...");
                header("location: home.php");
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
    <title>Sign up</title>
</head>
<body>
    <div class="all">
        <div class="container">
            <form action="" method="post">
                <div class="form_card">
                    <h3>Firstname: </h3>
                    <input type="text" name="firstname" required="required">
                </div>
                <div class="form_card">
                    <h3>Lastname: </h3>
                    <input type="text" name="lastname" required="required">
                </div>
                <div class="form_card">
                    <h3>Sex:</h3>
                    <input type="text" name="sex" required="required">
                </div>
                <div class="form_card">
                    <h3>Class:</h3>
                    <input type="text" name="class" required="required">
                </div>
                <!-- <div class="form_card">
                    <h3>Password:</h3>
                    <input type="password" name="password" required="required">
                </div><br> -->
                <button type="submit" name="signup">Add</button>
                <button><a href="home.php">Cancel</a></button>
            </form>
        </div>
    </div>
</body>
</html>