<?php
    session_start();
    require_once("dbcon.php");
    
    $article=$_POST['article'];
    $posts_img=$_POST['posts_img'];
    $article_video=$_POST['article_video'];
    
    
    $article= str_replace("\n", "<br>\n", "$article");

    $numrand=(mt_rand());//สุ่มตัวเลขจะเอาไว้เปลี่ยนชื่อไฟล์
    $upload_posts_img=$_FILES['posts_img'];
    $upload_article_img=$_FILES['article_img'];
    $upload_article_video=$_FILES['article_video'];
    date_default_timezone_set('Asia/Bangkok');
    $date=date("Ymd");

    $path_posts_img="posts/";
    $type_posts_img=strrchr($_FILES['posts_img']['name'],".");//เอาชื่อไฟล์ออกเหลือไว้แต่นามสกุล
    $newname_posts_img=$date.$numrand.$_SESSION["id"].$type_posts_img;
    $path_copy_posts_img=$path_posts_img.$newname_posts_img;

    $path_article_img="article/";
    $type_article_img=strrchr($_FILES['article_img']['name'],".");//เอาชื่อไฟล์ออกเหลือไว้แต่นามสกุล
    $newname_article_img=$date.$numrand.$_SESSION["id"].$type_article_img;
    $path_copy_article_img=$path_article_img.$newname_article_img;

    $path_article_video="video/";
    $type_article_video=strrchr($_FILES['article_video']['name'],".");//เอาชื่อไฟล์ออกเหลือไว้แต่นามสกุล
    $newname_article_video=$date.$numrand.$_SESSION["id"].$type_article_video;
    $path_copy_article_video=$path_article_video.$newname_article_video;
   
   
    $df_posts_img=move_uploaded_file($_FILES['posts_img']['tmp_name'],$path_copy_posts_img);//คัดลอกไฟล์ไปเก็บในที่เก็บ
    if($df_posts_img==False){
        $newname_posts_img="food.png";
    }

    $df_article_img=move_uploaded_file($_FILES['article_img']['tmp_name'],$path_copy_article_img);//คัดลอกไฟล์ไปเก็บในที่เก็บ
    if($df_article_img==False){
        $newname_article_img="";
    }

    $df_article_video=move_uploaded_file($_FILES['article_video']['tmp_name'],$path_copy_article_video);//คัดลอกไฟล์ไปเก็บในที่เก็บ
    if($df_article_video==False){
        $newname_article_video="";
    }

  
    
    $sql = "INSERT INTO postmenu (posts_name, posts_img, article_img, article, menu_id, id,article_video)
            VALUES ('{$_POST['posts_name']}', '{$newname_posts_img}', '{$newname_article_img}', '{$article}', '{$_POST['menu_id']}', '{$_SESSION['id']}','{$newname_article_video}')";

    if ($conn->query($sql) === TRUE) {
        sleep();
        header("location:Category.php");
        echo"<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
       
    } else {
        echo"<script>alert('เพิ่มข้อมูลไม่สำเร็จ')</script>";
    }

    $conn->close();
?>