<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
</head>
<body>

<?php 
require_once("dbcon.php");
if(isset($_POST['login'])) {
     $sql = "SELECT * FROM user WHERE email = '{$_POST['email']}' AND password= '{$_POST['password']}'";
     $result = $conn->query($sql);
     if($result->num_rows > 0) {
         $row = $result->fetch_assoc();
         $_SESSION["email"] = $row["password"];
         $_SESSION['id']=$row["id"];
         $_SESSION['u_level']=$row["u_level"];
     } else { ?>

        <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/index.php>
       <?php  echo"<script>alert('อีเมล หรือ รหัสผ่าน ไม่ถูกต้อง')</script>";
     }
 }
 if(isset($_SESSION['u_level'])) { 
    if ($_SESSION['u_level']=="b") {   
 ?>
    <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/index.php>
    <?php echo"<script>alert('บัญชี ของท่านถูก ระงับชั่วคราว')</script>";
    session_unset();
   
    }
}

 
 if(isset($_POST['logout'])) {
    session_unset();
}
if(isset($_SESSION['email'])) {
    require_once("home.php");
} else {
    require_once("login.php");
}
?>


</body>

</html>