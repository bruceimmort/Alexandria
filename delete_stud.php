<?php
    include("connect.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $statement = "DELETE FROM students_table WHERE stdID = '$id'";
        $query = mysqli_query($conn, $statement);
        if($query){
            header("location: home.php");
        }else{
            echo("<script> alert('Failed to delete data in database ...')</script>");
        }
    }

?>