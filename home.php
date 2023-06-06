<?php
    include("connect.php");
    $student_statement = "SELECT * FROM students_table";
    $books_statement = "SELECT * FROM books_name";
    $all_borrowed = "SELECT * FROM borrow_table";
    $student_query = mysqli_query($conn, $student_statement);
    $books_query = mysqli_query($conn, $books_statement);
    $borrowed_query = mysqli_query($conn, $all_borrowed);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
    <div class="all">
        <div class="all_students">
            <h2>All students</h2>
            <table border="0">
                <!-- <th> -->
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Update</th>
                    <th>Delete</th>
                <!-- </th> -->
                <?php 
                    if(mysqli_num_rows($student_query)){
                        while($all_students = mysqli_fetch_array($student_query)){
                            ?>
                                <tr>
                                    <td><?php echo $all_students[0]?></td>
                                    <td><?php echo $all_students[1]?></td>
                                    <td><?php echo $all_students[2]?></td>
                                    <td><?php echo $all_students[3]?></td>
                                    <td><?php echo $all_students[4]?></td>
                                    <td><button><a href="update_stud.php?id=<?php echo($all_students[0])?>">Update</a></button></td>
                                    <td><button><a href="delete_stud.php?id=<?php echo($all_students[0])?>">Delete</a></button></td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </table>
            <button name="add"><a href="add_student.php">Add student</a></button>
        </div>
        <div class="all_books">
            <h2>All books</h2>
            <table>
                <!-- <th> -->
                    <th>Id</th>
                    <th>Book</th>
                    <th>Author</th>
                <!-- </th> -->
                <?php 
                    if(mysqli_num_rows($books_query)){
                        while($all_books = mysqli_fetch_array($books_query)){
                            ?>
                                <tr>
                                    <td><?php echo $all_books[0]?></td>
                                    <td><?php echo $all_books[1]?></td>
                                    <td><?php echo $all_books[2]?></td>
                                    <td><button><a href="update_book.php?id=<?php echo($all_books[0])?>">Update</a></button></td>
                                    <td><button><a href="delete_book.php?id=<?php echo($all_books[0])?>">Delete</a></button></td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </table>
            <button name="add"><a href="add_book.php">Add book</a></button>
        </div>
        <div class="all_borrowed">
            <h2>All borrowed</h2>
            <table>
                <!-- <th> -->
                    <th>Id</th>
                    <th>Student</th>
                    <th>Book</th>
                <!-- </th> -->
                <?php 
                    if(mysqli_num_rows($borrowed_query)){
                        while($borrow = mysqli_fetch_array($borrowed_query)){
                            $userinfo = "SELECT firstname FROM students_table WHERE stdID = '$borrow[0]'";
                            $userquery = mysqli_query($conn,$userinfo);
                            $userdata = mysqli_fetch_array($userquery);
                            $bookinfo = "SELECT title FROM books_name WHERE bkID = '$borrow[0]'";
                            $bookquery = mysqli_query($conn,$bookinfo);
                            $bookdata = mysqli_fetch_array($bookquery);
                            
                            ?>
                                <tr>
                                    <td><?php echo $borrow[0]?></td>
                                    <td><?php echo $userdata[0]?></td>
                                    <td><?php echo $bookdata[0]?></td>
                                    <td><button><a href="update_borrow.php?id=<?php echo($all_books[0])?>">Update</a></button></td>
                                    <td><button><a href="delete_borrow.php?id=<?php echo($all_books[0])?>">Delete</a></button></td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </table>
            <button name="add"><a href="new_borrow.php">New borrow</a></button>
        </div>
    </div>
</body>
</html>