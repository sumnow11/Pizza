<?php session_start();
require_once("dbcon.php"); 

$sql = "INSERT INTO save_pos (id, posts_id) VALUES ('{$_SESSION['id']}','{$_GET['posts_id']}')";

    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('เพิ่มข้อมูลสำเร็จ')</script>"; ?>
        <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/Category.php>
       
    <?php } else {
        echo"<script>alert('เพิ่มข้อมูลไม่สำเร็จ')</script>";
    }

    $conn->close();

?>

