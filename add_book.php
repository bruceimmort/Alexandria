<?PHP
    include("connect.php");

    if(isset($_POST['add_book'])){
        $title = $_POST['title'];
        $author = $_POST['author'];

        $select_statement = "SELECT * FROM books_name WHERE title = '$title' AND author = '$author'";
        $insert_statement = "INSERT INTO books_name(title, author) VALUES ('$title','$author')";
        $select_query = mysqli_query($conn, $select_statement);
        $insert_query = mysqli_query($conn, $insert_statement);

        if(mysqli_num_rows($select_query) > 0 ){
            // die("Book exists ...");
            echo("<script> alert('Book exists ...')</script>");
        }else{
            if(!$insert_query){
                // die("Failed to insert data in database ...");
                echo("<script> alert('Failed to insert data in database ...')</script>");
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
                    <h3>Book name: </h3>
                    <input type="text" name="title" required="required">
                </div>
                <div class="form_card">
                    <h3>Author: </h3>
                    <input type="text" name="author" required="required">
                </div>
                <!-- <div class="form_card">
                    <h3>Password:</h3>
                    <input type="password" name="password" required="required">
                </div><br> -->
                <button type="submit" name="add_book">Add</button>
                <button><a href="home.php">Cancel</a></button>
            </form>
        </div>
    </div>
</body>
</html>