<?php session_start();
require_once('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>admin</title>
    <link rel="stylesheet" href="decorate.css">
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

              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    สูตรอาหาร
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                    <a class="dropdown-item " href="admin.php?post=#2" >สูตรอาหารทั้งหมด</a><br>
                    <?php while($row_menu=$result_menu->fetch_assoc()){?>
                    <a class="dropdown-item" href="admin.php?menu_id=<?php echo $row_menu['menu_id']; ?>"><?php echo $row_menu['menu_name']?></a><br>
                    <?php } ?>
                    <a class="dropdown-item" href="Fromadd.php">เพิ่มสูตรอาหาร</a><br>
                    <a class="dropdown-item" href="admin.php?menu_#=#2">แก้ไขหมวดหมู่</a><br>
                    </div>
                  </div>
                </div>
                <hr>
                <a class="dropdown-item" href="admin.php?user_#=#1"style="text-align :left;">ผู้ใช้งาน</a>
                <hr>
                <form action="index.php" method="post">
                <button class="dropdown-item" type="submit" name="logout"><h4>ออกจากระบบ</h4></button>
                </form>
            </div>
            </div>
<?php //<---------------------------------------------ส่วน form แสดงข้อมูล------------------------------------------------------------> ?>
<div class="col-lg-2 ml-5 mt-4 " style="float:left">
            <h1>จัดการข้อมูล<h1>
            <p class="square_1"></p>
            
                <div class= "mt-4" style="float:left">  
                           
                    <div class= "col-lg-2 ml-4 mt-3 text-center">
                        <input type="name" class="form-control" style="width:700px;" >
                    </div>
                    <div class= "ml-4 mt-3 mb-3"style="float:right">
                        <button  type="button" class="btn btn-block mb-4"style = "background-color:#ff580d">ค้นหา</button>
                        </div>
                        
<?php 
//<--------------------------------แสดงรายชื่อ สูตรอาหาร---------------------------------->
if(isset($_GET['menu_id'])!="") { ?>
 
    <table class="table" >
        <thead>
          <tr>
            <th scope="col"><h3>ID</h3></th>
            <th scope="col"><h3>รูป</h3></th>
            <th scope="col"><h3>สูตร</h3></th>
            <th scope="col"><h3>หมวด</h3></th>
            <th scope="col"><h3>โดย</h3></th>
            <th scope="col"><h3>วันที่</h3></th>
            <th scope="col"><h3>จัดการ</h3></th>
            
          </tr>
        </thead>
<?php


     $sql_posts = "SELECT * FROM postmenu WHERE menu_id  = '{$_GET['menu_id']}'";
     $result_posts = $conn->query($sql_posts);
     
     while($row_posts = $result_posts->fetch_assoc()) {
        
      $sql_menu_2 = "SELECT * FROM 	menu WHERE menu_id = '{$row_posts['menu_id']}'";
      $result_menu_2 = $conn->query($sql_menu_2);
      $row_menu_2 = $result_menu_2->fetch_assoc();
      
      $sql_user = "SELECT * FROM user WHERE id = '{$row_posts['id']}'";
      $result_user = $conn->query($sql_user);
      $row_user = $result_user->fetch_assoc();
  
   ?>
        <tbody>

        <tr class="table-warning ">
            <td><h5><?php echo"{$row_posts['posts_id']}" ?></h5></td>
            <td><h5><img src="posts/<?php echo $row_posts['posts_img'] ?>" width="50" height="50" style="border-radius: 50%;"></h5></td>
            <td><h5 ><a style="color:#ff580d;" href="show.php?posts_id=<?php echo $row_posts['posts_id']; ?>"><?php echo"{$row_posts['posts_name']}" ?></a></h5></td>
            <td><h5><?php echo"{$row_menu_2['menu_name']}" ?></h5></td>
            <td><h5><?php echo"{$row_user['username']}" ?></h5></td>
            <td><h5><?php echo"{$row_posts['posts_time']}" ?></h5></td>
            <td>
            <h5><button type="button" class="btn btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal"style = "background-color:#ffcc00">แก้ไข</button></th>
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
                        <input type="hidden" name="posts_id" id="posts_id" value="<?php echo $row_posts['posts_id'] ?>">
                              <input type="name" class="form-control" placeholder="ชื่อหมวดหมู่อาหาร" name="posts_name"value="<?php echo $row_posts['posts_name']; ?>">
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
                            $article=$row_posts['article'];
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
            
                <a type="button"  class="btn btn-block" href="?delete_posts=1&id=<?php echo $row_posts['posts_id']; ?>"style="background-color:#ff1a1a;">ลบ</a></h5>

    </td>
          </tr>
          <?php } ?>
        </tbody>
</table>

</div>
</div>


<?php }
//<--------------------------------แสดงรายชื่อ user---------------------------------->
 else if(isset($_GET['user_'])=="#1") { ?>
   <table class="table" >
   <thead>
     <tr>
      <th scope="col"><h3>ID</h3></th>
       <th scope="col"><h3>รูปโปรไฟล์</h3></th>
       <th scope="col"><h3>ชื่อ</h3></th>
       <th scope="col"><h3>สมัคร</h3></th>
       <th scope="col"><h3>จัดการ</h3></th>
     </tr>
   </thead>
<?php  $sql_user = "SELECT * FROM user ";
 $resultsql_user = $conn->query($sql_user);
 while($row_user = $resultsql_user->fetch_assoc()) {
  ?>
   <tr class="table-warning ">
   <?php if(($row_user['u_level'])!="a"){ ?>
           <td><h5><?php echo"{$row_user['id']}" ?></h5></td>
           <td><h5><img src="imguser/<?php echo $row_user['user_img'] ?>" width="50" height="50" style="border-radius: 50%;"></h5></td>
           <td><h5><?php echo"{$row_user['username']}" ?></h5></td>
           <td><h5><?php echo"{$row_user['user_ time']}" ?></h5></td>
          
           <td>
           <?php if(($row_user['u_level'])=="b"){ ?>
           <h5><a href="?u_level=1&id=<?php echo $row_user['id'];?>" class="btn " style = "background-color:#ff580d"type="button">ยกเลิกระงับการเข้าถึง</a>
           <?php }else{ ?>
              <h5><a href="?u_level=1&id=<?php echo $row_user['id'];?>"  class="btn " style = "background-color:#ffcc00"type="button">ระงับการเข้าถึง</a>
            <?php } ?>
               <a type="button"  class="btn " style = "background-color:#ff1a1a" href="?delete_user=1&id=<?php echo $row_user['id']; ?>">ลบ</a></h5>
           
<?php }?>
 
<?php }
 }
//<--------------------------------แสดงรายชื่อ หมวดหมู่---------------------------------->
else if(isset($_GET['menu_'])=="#2") { ?>
  <table class="table" >
   <thead>
     <tr>
      <th scope="col"><h3>ID</h3></th>
       <th scope="col"><h3>ชื่อหมวดหมู่</h3></th>
       <th scope="col"><h3>จัดการ</h3></th>
       <th> <button type="button" class="btn btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal"style = "background-color:#ff1a1a">แก้ไข</button></th>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อหมวดหมู่อาหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <?php  $sqlr_menu = "SELECT * FROM menu ";
                      $resul_menu= $conn->query($sqlr_menu);
                     
                        ?>
                  <div class="modal-body">
                    <form action="edit_menu.php" method="post">
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><h5>เลือกประหมวดหมู่ที่ต้องการแก้ไข</h5></label>
                        <select class="mt-2 form-select" aria-label="Default select example" name="menu_id">
                          <option selected>ประเภทอาหาร</option>
                            <?php while($row_menu = $resul_menu->fetch_assoc()) { ?>
                                <option value="<?php echo $row_menu['menu_id']; ?>"><?php echo $row_menu['menu_name'];?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="message-text" class="col-form-label"><h5>ชื่อหมวดหมู่ใหม่</h5></label>
                        <textarea class="form-control" id="message-text" name="menu_name"></textarea>
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
      <th> <button   type="button" class="btn btn-block" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style = "background-color:#ff580d">เพิ่ม</button></th>
              <form action="add_menu.php" method="post">
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">เพิ่มหมวดหมู่</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                            <input type="name" class="form-control" placeholder="ชื่อหมวดหมู่อาหาร" name="menu_name">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="sebmit" class="btn btn-primary">ตกลง</button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
     </tr>
   </thead>
<?php  $sqlr_menu_2 = "SELECT * FROM menu ";
        $resul_menu_2= $conn->query($sqlr_menu_2);
 while($row_menu_2 = $resul_menu_2->fetch_assoc()) { 
  ?>
   <tr class="table-warning ">
           
           <td><h5><?php echo"{$row_menu_2['menu_id']}" ?></h5></td>
           <td><h5><?php echo"{$row_menu_2['menu_name']}" ?></h5></td>
           
           <td>
               <h5><a href="?delete_menu=1&id=<?php echo $row_menu_2['menu_id']; ?>"style="color:#ff580d;">ลบ</a></h5></td>
<?php }
  }
//<----------------------------------------ลบ------------------------------------------------------------------>
else if(isset($_GET['delete_user'])) {
  $sql = "DELETE FROM user WHERE id  = '{$_GET['id']}'";
  if (mysqli_query($conn, $sql)) { ?>
    <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/admin.php?user_#=#1>
 <?php }
}else if(isset($_GET['delete_posts'])) {
  $sql = "DELETE FROM postmenu WHERE posts_id   = '{$_GET['id']}'";
  if (mysqli_query($conn, $sql)) { ?>
    <meta http-equiv=refresh content=0;URL=hhttp://localhost/Pizza/admin.php?>
 <?php }
}else if(isset($_GET['delete_menu'])) {
  $sql = "DELETE FROM menu WHERE menu_id   = '{$_GET['id']}'";
  if (mysqli_query($conn, $sql)) { ?>
    <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/admin.php?menu_#=#2>
 <?php }
}
//<-------------------------------------ระงับการเข้าถึง------------------------------------------------>
else if(isset($_GET['u_level'])) {
      $sql_u_level = "SELECT * FROM user WHERE id= '{$_GET['id']}'";
      $result_u_level = $conn->query($sql_u_level);
      $row_u_level = $result_u_level->fetch_assoc();
      if(($row_u_level['u_level'])=="b"){ 
        $u="u";
        $sql = "UPDATE user SET u_level = '{$u}' WHERE id = '{$_GET['id']}' "; 
         if ($conn->query($sql) === TRUE) { ?>
        <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/admin.php?user_#=#1>
      <?php }
       }
      else{
        $b="b";
        $sql = "UPDATE user SET u_level = '$b' WHERE id = '{$_GET['id']}' "; 
          if ($conn->query($sql) === TRUE) { ?>
        <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/admin.php?user_#=#1>
      <?php }
  }
}

//<-----------------------------------------สูตรทั้งหมด--------------------------------------------------------->
else if(isset($_GET['post'])=="#2") { ?>
 <table class="table" >
        <thead>
          <tr>
            <th scope="col"><h3>ID</h3></th>
            <th scope="col"><h3>รูป</h3></th>
            <th scope="col"><h3>สูตร</h3></th>
            <th scope="col"><h3>หมวด</h3></th>
            <th scope="col"><h3>โดย</h3></th>
            <th scope="col"><h3>วันที่</h3></th>
            <th scope="col"><h3>จัดการ</h3></th>
            
          </tr>
        </thead>
<?php


     $sql_posts = "SELECT * FROM postmenu ";
     $result_posts = $conn->query($sql_posts);
     
     while($row_posts = $result_posts->fetch_assoc()) {
        
      $sql_menu_2 = "SELECT * FROM 	menu WHERE menu_id = '{$row_posts['menu_id']}'";
      $result_menu_2 = $conn->query($sql_menu_2);
      $row_menu_2 = $result_menu_2->fetch_assoc();
      
      $sql_user = "SELECT * FROM user WHERE id = '{$row_posts['id']}'";
      $result_user = $conn->query($sql_user);
      $row_user = $result_user->fetch_assoc();
  
   ?>
        <tbody>

          <tr class="table-warning ">
            <td><h5><?php echo"{$row_posts['posts_id']}" ?></h5></td>
            <td><h5><img src="posts/<?php echo $row_posts['posts_img'] ?>" width="50" height="50" style="border-radius: 50%;"></h5></td>
            <td><h5 ><a style="color:#ff580d;" href="show.php?posts_id=<?php echo $row_posts['posts_id']; ?>"><?php echo"{$row_posts['posts_name']}" ?></a></h5></td>
            <td><h5><?php echo"{$row_menu_2['menu_name']}" ?></h5></td>
            <td><h5><?php echo"{$row_user['username']}" ?></h5></td>
            <td><h5><?php echo"{$row_posts['posts_time']}" ?></h5></td>
            <td>
            <h5><button type="button" class="btn btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal"style = "background-color:#ffcc00">แก้ไข</button></th>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขสูตรอาหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <?php  $sqlr_menu = "SELECT * FROM menu ";
                      $resul_menu= $conn->query($sqlr_menu);
                     
                        ?>
                  <div class="modal-body">
                    <form action="edit_post.php" method="post">
                      <div class="mb-3">
                        <div width="100">
                        <input type="hidden" name="posts_id" id="posts_id" value="<?php echo $row_posts['posts_id'] ?>">
                              <input type="name" class="form-control" placeholder="ชื่อหมวดหมู่อาหาร" name="posts_name"value="<?php echo $row_posts['posts_name']; ?>">
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
                            $article=$row_posts['article'];
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
            
                <a type="button"  class="btn btn-block" href="?delete_posts=1&id=<?php echo $row_posts['posts_id']; ?>"style="background-color:#ff1a1a;">ลบ</a></h5>

    </td>
          </tr>
          <?php } ?>
        </tbody>
</table>

</div>
</div>
 
 
  <?php }?>
  
  </body>
</html>