<?php 
    require_once("dbcon.php");
    $article=$_POST['article'];
    $article= str_replace("\n", "<br>\n", "$article");
    $sql = "UPDATE postmenu SET
    posts_name = '{$_POST['posts_name']}',
    article = '{$article}',
    menu_id  = '{$_POST['menu_id']}',
    menu_id  = '{$_POST['menu_id']}'
    WHERE posts_id = '{$_POST['posts_id']}' ";

    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('เพิ่มข้อมูลสำเร็จ')</script>"; ?>
        <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/show.php?posts_id=<?php echo $_POST['posts_id']?>>
       
    <?php } else { 
         echo"<script>alert('เพิ่มข้อมูลไม่สำเร็จ')</script>"; ?>
      
     
     
    <?php }

    $conn->close();
    
?>