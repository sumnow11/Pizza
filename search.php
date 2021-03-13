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
    <?php include('t.php'); 
    
    if((isset ($_GET['submit_c']))||($_GET['search'])){
    $sql= "SELECT * FROM postmenu WHERE posts_name LIKE '%{$_GET['search']}%'";
    $result = $conn ->query($sql);
   
    while($row = $result->fetch_assoc()) {
                $sql_menu = "SELECT * FROM menu WHERE menu_id = '{$row['menu_id']}'";
                $result_menu = $conn->query($sql_menu);
                $row_menu = $result_menu->fetch_assoc();

                
                $sql_user = "SELECT * FROM user WHERE id = '{$row['id']}'";
                $result_user = $conn->query($sql_user);
                $row_user = $result_user->fetch_assoc();
        ?>
        <div class="container" >
            <p class="square mt-5"style="width: 1100px;"></p>
        <div class="ml-5 mt-4 "div style="float:left">
            <img src="posts/<?php echo $row['posts_img'] ?> "style= "align: center; border-radius: 50%;" width="150" height="150">   
        
        </div> 

        <h1 >&nbsp;&nbsp;<a href="show.php?posts_id=<?php echo $row['posts_id']; ?>"style="color:#ff580d;"><?php echo "{$row['posts_name']}" ?></a> </h1>
        <h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"หมวดหมู่ : {$row_menu['menu_name']}" ?></h3>
        <h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"ผู้โพสต์ : {$row_user['username']}" ?></h3>
        <h3 >&nbsp;&nbsp;&nbsp;&nbsp;คะแนน :</h3>

        </table>

        <?php } }?>
        <p class="square mt-5 mb-5"style="width: 1100px;"></p>

     

        