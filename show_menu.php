<?php session_start();
require_once("dbcon.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>หมวดหมู่</title>
    <link rel="stylesheet" href="decorate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('Taskbar.php'); ?>
    <?php include('t.php'); ?>
    
</head>
<?php
     $sql_posts = "SELECT * FROM postmenu WHERE menu_id  = '{$_GET['menu_id']}'ORDER BY posts_time DESC";
     $result_post = $conn->query($sql_posts);
    
    
   ?>
<body>


<?php while($row_post = $result_post->fetch_assoc()) {
        
        $sql_menu = "SELECT * FROM menu WHERE menu_id = '{$row_post['menu_id']}'";
        $result_menu = $conn->query($sql_menu);
        $row_menu = $result_menu->fetch_assoc();
        
        $sql_user = "SELECT * FROM user WHERE id = '{$row_post['id']}'";
        $result_user = $conn->query($sql_user);
        $row_user = $result_user->fetch_assoc();
?>
<body>
<div class="container" >
    <p class="square mt-5"style="width: 1100px;"></p>
<div class="ml-5 mt-4 "div style="float:left">
    <img src="posts/<?php echo $row_post['posts_img'] ?> "style= "align: center; border-radius: 50%;" width="150" height="150">   
   
</div> 

<h1 >&nbsp;&nbsp;<a href="show.php?posts_id=<?php echo $row_post['posts_id']; ?>"style="color:#ff580d;"><?php echo "{$row_post['posts_name']}" ?></a> </h1>
<h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"หมวดหมู่ : {$row_menu['menu_name']}" ?></h3>
<h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"ผู้โพสต์ : {$row_user['username']}" ?></h3>

<h3 >&nbsp;&nbsp;&nbsp;&nbsp;<a type="button" class="btn " style = "background-color:#ff580d" href="save.php?posts_id=<?php echo $row_post['posts_id']; ?>">บันทึก</a> </h3>


<?php } ?>
<p class="square mt-5 mb-5"style="width: 1100px;"></p>

</body>
<footer class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p class="text-muted">&copy; 2021. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </footer>
</html>