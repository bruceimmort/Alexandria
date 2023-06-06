<?PHP
    include("connect.php");

    if(isset($_POST['borrow'])){
        $student = $_POST['student'];
        $book_name = $_POST['book_name'];

        $select_statement = "SELECT * FROM borrow_table WHERE student = '$student' AND book_name = '$book_name'";
        $insert_statement = "INSERT INTO borrow(student, book_name) VALUES ('$student','$book_name')";
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
    <title>New Borrow</title>
</head>
<body>
    <div class="all">
        <div class="container">
            <form action="" method="post">
                <div class="form_card">
                    <h3>Student: </h3>
                    <input type="text" name="student" required="required">
                </div>
                <div class="form_card">
                    <h3>Book name: </h3>
                    <input type="text" name="book_name" required="required">
                </div>
                <button type="submit" name="borrow">Borrow</button>
                <button><a href="home.php">Cancel</a></button>
            </form>
        </div>
    </div>
</body>
</html>