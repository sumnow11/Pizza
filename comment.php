
<?php
session_start();
  require_once("dbcon.php");
  

  $sql = "INSERT INTO comment (posts_id,comment,id)
  VALUES ('{$_POST['posts_id']}','{$_POST['comment']}','{$_SESSION['id']}')";

if ($conn->query($sql) === TRUE) {
  echo"<script>alert('เพิ่มข้อมูลสำเร็จ')</script>"; ?>
  <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/show.php?posts_id=<?php echo $_POST['posts_id']?>>
 
<?php } else { 
   echo"<script>alert('เพิ่มข้อมูลไม่สำเร็จ')</script>"; ?>
 <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/show.php?posts_id=<?php echo $_POST['posts_id']?>>


<?php }

  ?>