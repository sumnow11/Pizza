<?php require_once("dbcon.php"); ?>

<?php
     $sql = "SELECT * FROM comment WHERE posts_id ='{$_GET['posts_id']}' ORDER BY c_time DESC";
     $result= $conn->query($sql);
     while($row = $result->fetch_assoc()){

        $sql_post = "SELECT * FROM postmenu WHERE posts_id  = '{$row['posts_id']}'";
        $result_post = $conn->query($sql_post);
        $row_post = $result_post->fetch_assoc();
        
        $sql_user = "SELECT * FROM user WHERE id = '{$row['id']}'";
        $result_user = $conn->query($sql_user);
        $row_user = $result_user->fetch_assoc();
     
     
   ?>
   
     <table class="table"style="width: 500px;">
        <tr >
        <th> <img src="imguser/<?php echo $row_user['user_img'] ?>" width="30" height="30" style="border-radius: 50%;"> </th>
        <th><?php echo $row_user['username'] ?></th>
        <th><?php echo $row['c_time'] ?></th>
     </table>
     <tr class="table-warning">
         <td></td>
         <td><?php echo $row['comment'] ?></td>
     </tr>
     </table>
     <?php }?>
  