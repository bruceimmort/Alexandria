<?php
    include("connect.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $statement = "DELETE FROM books_name WHERE bkID = '$id'";
        $query = mysqli_query($conn, $statement);
        if($query){
            header("location: home.php");
        }else{
            echo("<script> alert('Failed to delete data in database ...')</script>");
        }
    }

?>