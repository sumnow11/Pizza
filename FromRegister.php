<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
	<img class="wave" src="img/18304.svg">
	<div class="container">
		<div class="img">
			<img src="img/undraw_cooking_lyxy.svg">
		</div>
		<div class="login-content">
			<form action="Register.php" method="post"enctype="multipart/form-data">
				<img src="img/Pizza1.png">
                <h1 >สร้างบัญชี</h1>
                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
                    
           		   <div class="div">
           		   		<h5>ชื่อผู้ใช้</h5>
           		   		<input type="text" class="input"name="username" required>
           		   </div>
           		</div>
				
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-at"></i>
           		   </div>
                    
           		   <div class="div">
           		   		<h5>อีเมล</h5>
           		   		<input type="email" class="input"name="email" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>รหัสผ่าน</h5>
           		    	<input type="password" class="input"name="password" required>
            	   </div>
                </div>
                
				<h5 class="text-white">ภาพโปรไฟล์</h5>
				<input class="form-control form-control-sm" id="formFileSm" type="file"name="user_img" accept="image/*">
                <div class="mb-3">
				<button type="submit" class="btn1" name="submit"class="btn">ยืนยัน</button>
				
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>