<?php
  
    require_once("dbcon.php");
    

    $sql = "INSERT INTO menu (menu_name)
    VALUES ('{$_POST['menu_name']}')";

if ($conn->query($sql) === TRUE) {
    echo"<script>alert('เพิ่มข้อมูลสำเร็จ')</script>"; ?>
    <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/admin.php?menu_#=#2>
   
<?php } else { 
     echo"<script>alert('เพิ่มข้อมูลไม่สำเร็จ')</script>"; ?>
    <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/admin.php?menu_#=#2>
 
 
<?php }

    ?>