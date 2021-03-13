<?php session_start() ;
require_once('dbcon.php');
?>;
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>แก้ไขสูตรอาหาร</title>
    <?php 
    
    include('Taskbar.php'); ?>
    <link rel="stylesheet" href="decorate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <?php include('t.php'); ?>
    
</head>
<body>
<?php $sql = "SELECT * FROM postmenu WHERE posts_id  = '{$_GET['id']}'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $row_post = $result->fetch_assoc(); ?>


<form action="edit_post.php" method="post" enctype="multipart/form-data" >
<input type="hidden" name="posts_id" id="posts_id" value="<?php echo $row_post['posts_id'] ?>">
    <h1 class="col-xl-9 ml-5 mt-4 " style="font-size:50px">เพิ่มสูตรอาหาร</h1>
    <p class="square"></p>
    <div class="ml-5 mt-4 "div style="float:left">
    
        <img src="img\plus-circle-dotted.svg" width="200" data-bs-toggle="modal" data-bs-target="#exampleModal" >   
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">ภาพเมนู</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <p>เลือกภาพเมนู</p>
                        <div class="mb-3">
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="posts_img" accept="image/*">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style = "background-color:#ff580d">ตกลง</button>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php 
  $sql = "SELECT * FROM menu";
  $result = $conn->query($sql);
?>
    <div class="ml-5 mt-4" style="float:left">
            <input type="name" class="form-control"placeholder="ชื่อสูตรอาหาร"style="width:700px;" name="posts_name"value="<?php echo $row_post['posts_name']; ?>">
           
            <select class="mt-2 form-select" aria-label="Default select example" name="menu_id">
            <option selected>ประเภทอาหาร</option>
            <?php while($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['menu_id']; ?>"><?php echo $row['menu_name'];?></option>
            <?php } ?>
            
</select>
            <?php 
            $article=$row_post['article'];
            $article= str_replace("<br>", "\n", "$article"); ?>
        
            <textarea class="mt-2 form-control"  rows="10"placeholder="ข้อมูล" name="article" > <?php echo $article ?></textarea>
           
                <table  class="mt-2 form-control"><tr>
                    <th><h3 style="font-size:20px">เพิ่มภาพประกอบ</h3></th>
                    <th><h3 style="font-size:20px">เพิ่มวิดีโอประกอบ</h3></th>
                </tr>
                <tr>
                    <td><input class="btn btn" id="formFileSm" type="file" name="article_img" accept="image/*"></td>
                    <td><input class="btn btn" id="formFileSm" type="file" name="article_video"accept="video/*" ></td>
                </tr>
            </table>
            <div class="mt-2 mb-5"style="float:right">
                <button  type="submit" class="btn"style = "background-color:#ff580d">เพิ่ม</button>
            </div>
</div> 
</form>   
</body>
<?php } ?>
</html>