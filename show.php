<?php session_start();
require_once("dbcon.php"); 

?>
<?php
     $sql_posts = "SELECT * FROM postmenu WHERE posts_id  = '{$_GET['posts_id']}' ";
     $result_post = $conn->query($sql_posts);
   
    
   ?>
   <?php while($row_post = $result_post->fetch_assoc()) {
        
        $sql_menu = "SELECT * FROM menu WHERE menu_id = '{$row_post['menu_id']}'";
        $result_menu = $conn->query($sql_menu);
        $row_menu = $result_menu->fetch_assoc();
        
        $sql_user = "SELECT * FROM user WHERE id = '{$row_post['id']}'";
        $result_user = $conn->query($sql_user);
        $row_user = $result_user->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo "{$row_post['posts_name']}" ?></title>
    <link rel="stylesheet" href="decorate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('Taskbar.php'); ?>
    <?php include('t.php'); ?>
    
</head>

<body>



<div class="col-lg ">
    <h1 class="ml-5 mt-4 " style="font-size:50px"><?php echo "{$row_post['posts_name']}" ?></h1>
        <p class="square mt-5 mb-3"style="width: 1100px;"></p>
    <div class="mt-5 text-center">
        <img src="posts/<?php echo $row_post['posts_img'] ?> "style= " border-radius: 10%;" width= "500"  > 
       


       
            <h5 class="mt-5 "><?php echo"ผู้โพสต์ : {$row_user['username']}" ?></h5>
            
        </div>
        <div class="container" >
                <div class="col-lx mt-5 ml-5">
                    <h5 class="mt-3 "><?php echo "{$row_post['article']}" ?></h5>
                </div>
                </div> 
                <?php if(($row_post['article_img'])!=""){ ?>
                    <div class="mt-5 mb-5 text-center">
                        <img src="article/<?php echo $row_post['article_img'] ?> "width= "500">
                    </div>
                    <?php } ?>
                <?php if(($row_post['article_video'])!=""){ ?>
                    <div class="mt-5 mb-5 text-center">
                            <video controls="controls " width= "500">
                            <source src="video/<?php echo $row_post['article_video'] ?>"/>
                            </video>
                    </div>
        </div>
            <?php } ?>
</div>
<p class="square mt-5 mb-5"style="width: 1100px;"></p>


        <div class="container mb-5">
            <div class="ml-5">
            <p>แสดงความคิดเห็น</p>
            <form action="comment.php" method="post" class="form-horizontal">
                <textarea name="comment" class="form-control"style="width: 1000px;"require>

                </textarea>
                        <br>
                        <input type="hidden" name="posts_id" value="<?php echo $row_post['posts_id'] ?>">
                        <button type="submit" class="btn btn mr-5" style="background-color:#ff770d; float:right ;">แสดงความคิดเห็น</button>

            </form>
            <p>รายการแสดงความคิดเห็น</p>
            <?php require_once("c_list.php"); ?>
        </div>
        </div>
        <?php } ?>
        <footer class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p class="text-muted">&copy; 2021. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>