<?php  $sql = "SELECT * FROM postmenu ORDER BY posts_time DESC";
            $result = $conn->query($sql);
        ?>
<body>
<div class="container" >
              <h1 class="col-xl-9 ml-5 mt-4 " style="font-size:50px">สูตรอาหาร</h1>

              <?php while($row = $result->fetch_assoc()) {
                      
                      $sql_menu = "SELECT * FROM menu WHERE menu_id = '{$row['menu_id']}'";
                      $result_menu = $conn->query($sql_menu);
                      $row_menu = $result_menu->fetch_assoc();
                      
                      $sql_user = "SELECT * FROM user WHERE id = '{$row['id']}'";
                      $result_user = $conn->query($sql_user);
                      $row_user = $result_user->fetch_assoc();

                      $sql_save_pos = "SELECT * FROM save_pos WHERE id = '{$_SESSION['id']}'";
                      $result_save_pos = $conn->query($sql_save_pos);
                      $row_save_pos= $result_save_pos->fetch_assoc();
                
              ?>
                  <p class="square mt-5"style="width: 1100px;"></p>
              <div class="ml-5 mt-4 "div style="float:left">
                  <img src="posts/<?php echo $row['posts_img'] ?> "style= "align: center; border-radius: 50%;" width="150" height="150">   
                
              </div> 

              <h1 >&nbsp;&nbsp;<a href="show.php?posts_id=<?php echo $row['posts_id']; ?>"style="color:#ff580d;"><?php echo "{$row['posts_name']}" ?></a> </h1>
              <h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"หมวดหมู่ : {$row_menu['menu_name']}" ?></h3>
              <h3 >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo"ผู้โพสต์ : {$row_user['username']}" ?></h3>
             
                

                  <h3 >&nbsp;&nbsp;&nbsp;&nbsp;<a type="button" class="btn " style = "background-color:#ff580d" href="save.php?posts_id=<?php echo $row['posts_id']; ?>">บันทึก</a> </h3>
              <?php

              } ?>
              <p class="square mt-5 mb-5"style="width: 1100px;"></p>
      </div>