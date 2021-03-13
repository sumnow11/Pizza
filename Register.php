<?php 
    session_start();
    include('dbcon.php');
    
    $errors = array();

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password =  $_POST['password'];
        $ure_img=$_POST['user_img'];
        
        
        $numrand=(mt_rand());//สุ่มตัวเลขจะเอาไว้เปลี่ยนชื่อไฟล์
        $upload=$_FILES['user_img'];
        date_default_timezone_set('Asia/Bangkok');
        $date=date("Ymd");
       

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }
        
        
            $path="imguser/";
            $type=strrchr($_FILES['user_img']['name'],".");//เอาชื่อไฟล์ออกเหลือไว้แต่นามสกุล
            $newname=$date.$numrand. $username.$type;
            $path_copy=$path.$newname;
           
            $df=move_uploaded_file($_FILES['user_img']['tmp_name'],$path_copy);//คัดลอกไฟล์ไปเก็บในที่เก็บ
            if($df==False){
                $newname="undraw_profile_pic_ic5t.svg";
            }
        
       
        }

        if (count($errors) == 0) {
            $sql = "INSERT INTO user ( email,username,password,user_img,u_level) VALUES ('$email','$username','$password','$newname','u')";
            mysqli_query($conn, $sql);
            $_SESSION['email'] = $email; ?>
            <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/login.php>
            <?php echo"<script>alert('สร้างบัญชีสำเร็จ กรุณาเข้าระบบใหม่')</script>";
            
        } else { ?>
            <meta http-equiv=refresh content=0;URL=http://localhost/Pizza/FromRegister.php>
            <?php echo"<script>alert('สร้างบัญชีไม่สำเร็จ กรุณาสร้างบัญชีใหม่อีกครั้ง')</script>";
        }
    

?>