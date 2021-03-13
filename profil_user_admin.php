<?php
session_start();
if (($_SESSION['u_level'])=="a") { 
    header("location:admin.php");
}else if(($_SESSION['u_level'])=="u"){
    header("location:ProfileUser.php");
}else if(($_SESSION['u_level'])=="b"){ ?>
    <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/index.php>
    <?php echo"<script>alert('บัญชี ของท่านถูก ระงับชั่วคราว')</script>";
    session_unset();
}
    ?>