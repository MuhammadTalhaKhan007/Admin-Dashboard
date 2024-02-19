<?php
    include('connection.php');
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlDelete = "DELETE FROM tours where id = '$id'";
        $resultDelete = mysqli_query($conn, $sqlDelete);
        echo"<script>alert('Tour has been deleted successfully!')</script>";
        echo"<script>location.href='Day Tours From London.php'</script>";
    }
?>