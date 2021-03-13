<?php session_start();
require_once('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php include('Taskbar.php'); ?>
    <?php include('t.php'); ?>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="col-lg ml-5 mt-3 text-center"style="float:left; background-color:#ff770d; width:300px;height:auto;border-radius: 2%;">
        
        <?php   $sql = "SELECT * FROM user WHERE id= '{$_SESSION['id']}'";
                $result = $conn->query($sql);
                
                $sql_menu ="SELECT * FROM menu";
                $result_menu=$conn->query($sql_menu);
                $row_menu = $result_menu->fetch_assoc();
        while($row = $result->fetch_assoc()) {
 
?>
        <img src="imguser/<?php echo $row['user_img'] ?>" class="mt-3" width="200" height="200" style="border-radius: 50%;"  data-bs-toggle="modal" data-bs-target="#exampleModal">
        <h1><?php echo $row['username']?></h1>
        <?php } ?>

    <hr>
    <a class="dropdown-item " href="?show_=#1"style="text-align :left;" >สูตรอาหารทั้งหมด</a>
    <hr>
    <a class="dropdown-item" href="?save_=#1"style="text-align :left;">สูตรอาหารที่ชื่นชอบ</a>
    <hr>
    <a class="dropdown-item" href="Fromadd.php"style="text-align :left;">เพิ่มสูตรอาหาร</a>
    <hr>
    <a class="dropdown-item" href="?delete_user=1&id=<?php echo $_SESSION['id'] ?>"style="text-align :left;">ลบบัชชี</a>
    <hr>
    <form action="index.php" method="post">
    <button class="dropdown-item" type="submit" name="logout"><h4>ออกจากระบบ</h4></button>
    </form>
</div>
</div>

</div>
<?php  //<---------------------------------------แสดงหน้าบันทึก---------------------------------------------->
         if(isset($_GET['save_'])=="#1") { ?>
    <div class="container" >
         <h1 class="ml-5 mt-4 " style="font-size:50px">สูตรอาหารที่บันทึก</h1>
          <div class="col-lg-2 ml-5 mt-1 " style="float:left">
    
          <?php  $sql = "SELECT * FROM save_pos WHERE id = '{$_SESSION['id']}' ";
              $result = $conn->query($sql);
          ?>
          
          

          <?php while($row = $result->fetch_assoc()) {
                  
                  $sql_postmenu = "SELECT * FROM postmenu WHERE posts_id  = '{$row['posts_id']}'";
                  $result_postmenu = $conn->query($sql_postmenu);
                  $row_postmenu = $result_postmenu->fetch_assoc();
                  
                  $sql_user = "SELECT * FROM user WHERE id = '{$row['id']}'";
                  $result_user = $conn->query($sql_user);
                  $row_user = $result_user->fetch_assoc();

                  $sql_menu = "SELECT * FROM menu WHERE menu_id = '{$row_postmenu['menu_id']}'";
                  $result_menu = $conn->query($sql_menu);
                  $row_menu = $result_menu->fetch_assoc();
          ?>
          <div class= "mt-4" style="float:left">
              <p class="square_1 mt-5"></p>
          <div class="ml-5 mt-4 "div style="float:left">
              <img src="posts/<?php echo $row_postmenu['posts_img'] ?> "style= "align: center; border-radius: 50%;" width="150" height="150">   
          
          </div> 

          <h1 >&nbsp;&nbsp;<a href="show.php?posts_id=<?php echo $row_postmenu['posts_id']; ?>"style="color:#ff580d;"><?php echo "{$row_postmenu['posts_name']}" ?></a> </h1>
          <h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"หมวดหมู่ : {$row_menu['menu_name']}" ?></h3>
          <h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"ผู้โพสต์ : {$row_user['username']}" ?></h3>
          

          </table>

          <?php } ?>
          <p class="square_1 mt-5 mb-5"></p>
          </div>
</div>
             
        <?php }
//<------------------------------------------------show-------------------------------------------------------------------->
if(isset($_GET['show_'])=="#1") { ?>
           
           <div class="col-lg-2 ml-5 mt-4 " style="float:left">

                            
                              
            <?php  $sql = "SELECT * FROM postmenu WHERE id = '{$_SESSION['id']}' ORDER BY posts_time DESC";
                $result = $conn->query($sql);
            ?>
            <body>
            <h1 style="font-size:50px">สูตรอาหาร</h1>

            <?php while($row = $result->fetch_assoc()) {
                    
                    $sql_menu = "SELECT * FROM menu WHERE menu_id = '{$row['menu_id']}'";
                    $result_menu = $conn->query($sql_menu);
                    $row_menu = $result_menu->fetch_assoc();
                    
                    $sql_user = "SELECT * FROM user WHERE id = '{$row['id']}'";
                    $result_user = $conn->query($sql_user);
                    $row_user = $result_user->fetch_assoc();
            ?>
            <div class= "mt-4" style="float:left">
                <p class="square_1 mt-5"></p>
            <div class="ml-5 mt-5 "div style="float:left">
                <img src="posts/<?php echo $row['posts_img'] ?> "style= "align: center; border-radius: 50%;" width="150" height="150">   

            </div> 

            <h1 >&nbsp;&nbsp;<a href="show.php?posts_id=<?php echo $row['posts_id']; ?>"style="color:#ff580d;"><?php echo "{$row['posts_name']}" ?></a> </h1>
            <h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"หมวดหมู่ : {$row_menu['menu_name']}" ?></h3>
            <h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"ผู้โพสต์ : {$row_user['username']}" ?></h3>
            
            <button type="button" class="btn btn-block mt-3 ml-4" data-bs-toggle="modal" data-bs-target="#exampleModal"style = "background-color:#ffcc00;width:80px; ">แก้ไข</button></th>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขสูตรอาหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <?php  
                      $sqlr_menu = "SELECT * FROM menu ";
                      $resul_menu= $conn->query($sqlr_menu);
                     
                        ?>
                  <div class="modal-body">
                    <form action="edit_post.php" method="post">
                      <div class="mb-3">
                        <div width="100">
                        <input type="hidden" name="posts_id" id="posts_id" value="<?php echo $row['posts_id'] ?>">
                              <input type="name" class="form-control" placeholder="ชื่อหมวดหมู่อาหาร" name="posts_name"value="<?php echo $row['posts_name']; ?>">
                        </div>
                        <select class="mt-2 form-select" aria-label="Default select example" name="menu_id">
                          <option selected>ประเภทอาหาร</option>
                            <?php while($row_menu = $resul_menu->fetch_assoc()) { ?>
                                <option value="<?php echo $row_menu['menu_id']; ?>"><?php echo $row_menu['menu_name'];?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="message-text" class="col-form-label mt-2"><h5>ข้อมูล</h5></label>
                        <?php 
                            $article=$row['article'];
                            $article= str_replace("<br>", "\n", "$article"); ?>
                        
                            <textarea class="mt-2 form-control"  rows="10"placeholder="ข้อมูล" name="article" > <?php echo $article ?></textarea>
                      </div>
            
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submin_menu" class="btn btn-primary" name="edit_menu">ตกลง</button>
                  </div>
              
                </div>
              </div>
            </div>
            </form >           
            
                <a type="button"  class="btn btn-block mt-3" href="?delete_posts=1&id=<?php echo $row['posts_id']; ?>"style="background-color:#ff1a1a;width:80px;">ลบ</a></h5>
            </table>

            <?php } ?>
            <p class="square_1 mt-5 mb-5"></p>
<?php 
}else if(isset($_GET['delete_user'])) {
    $sql = "DELETE FROM user WHERE id  = '{$_GET['id']}'";
    if (mysqli_query($conn, $sql)) { 
        session_unset(); ?>
    <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/index.php>
    <?php echo"<script>alert('ลบบัญชีสำเร็จ')</script>";
    
    }
}else if(isset($_GET['delete_posts'])) {
        $sql = "DELETE FROM postmenu WHERE posts_id ='{$_GET['id']}'";
        if (mysqli_query($conn, $sql)) { ?>
          <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/ProfileUser.php?show_=#1>
       <?php }
}

?>
</body>
</head>