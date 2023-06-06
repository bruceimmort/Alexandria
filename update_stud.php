<?php
    include("connect.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $select_statement = "SELECT * FROM students_table WHERE stdID = '$id'";
        $select_query = mysqli_query($conn, $select_statement);
        $single_stud = mysqli_fetch_array($select_query);
        // echo($single_book[1]);
        if(isset($_POST['update'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $sex = $_POST['sex'];
            $class = $_POST['class'];
            $statement = "UPDATE students_table SET firstname = '$firstname', lastname = '$lastname', sex = '$sex', class = '$class' WHERE stdID = '$id'";
            $query = mysqli_query($conn, $statement);
            if($query){
                header("location: home.php");
            }else{
                echo("<script> alert('Failed to update data in database ...')</script>");
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
    <title>Update book</title>
</head>
<body>
<div class="all">
        <div class="container">
            <form action="" method="post">
                <div class="form_card">
                    <h3>Firstname: </h3>
                    <input type="text" name="firstname" required="required" value="<?= $single_stud[1]?>">
                </div>
                <div class="form_card">
                    <h3>Lastname: </h3>
                    <input type="text" name="lastname" required="required" value="<?= $single_stud[2]?>">
                </div>
                <div class="form_card">
                    <h3>Sex:</h3>
                    <input type="text" name="sex" required="required" value="<?= $single_stud[3]?>">
                </div>
                <div class="form_card">
                    <h3>Class:</h3>
                    <input type="text" name="class" required="required" value="<?= $single_stud[4]?>">
                </div>
                <button type="submit" name="update">Update</button>
                <button><a href="home.php">Cancel</a></button>
            </form>
        </div>
    </div>
</body>
</html>