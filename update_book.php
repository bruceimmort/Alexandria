<?php
    include("connect.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $select_statement = "SELECT * FROM books_name WHERE bkID = '$id'";
        $select_query = mysqli_query($conn, $select_statement);
        $single_book = mysqli_fetch_array($select_query);
        // echo($single_book[1]);
        if(isset($_POST['update'])){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $statement = "UPDATE books_name SET title = '$title', author = '$author' WHERE bkID = '$id'";
            $query = mysqli_query($conn, $statement);
            if($query){
                header("location: home.php");
            }else{
                echo("<script> alert('Failed to delete data in database ...')</script>");
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
                    <h3>Book name: </h3>
                    <input type="text" name="title" required="required" value="<?= $single_book[1]?>">
                </div>
                <div class="form_card">
                    <h3>Author: </h3>
                    <input type="text" name="author" required="required" value="<?= $single_book[2]?>">
                </div>
                <button type="submit" name="update">Update</button>
                <button><a href="home.php">Cancel</a></button>
            </form>
        </div>
    </div>
</body>
</html>