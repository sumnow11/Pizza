<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
    <?php include('Taskbar.php'); ?>
    <link rel="stylesheet"href="index.css">
    <link rel="stylesheet" href="decorate.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital@1&display=swap" rel="stylesheet">
    <?php require_once("dbcon.php"); ?>
</head>
<body>

<header  class="text-white" >
  
<div class="container">
        <div class="col-xl-9 ml-2 font">
          
        
             <h1 class="mt-0 mb-5" style="font-size:100px">
             <b><I>Pizza </I> </b> 
            </h1> 
            <h3 style="font-size:35px">
            แหล่งรวบรวมสูตรอาหารไว้มากมาย <br> สำหรับผู้รักในการทำอาหาร</h3>
               
            
        </div>
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5"></h1>
          </div>

          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action="search.php" method="get">
              <div class="row d-flex">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" class="form-control form-control-lg" placeholder="ค้นหาสูตรอาหาร" name="search">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg " style = "background-color:#ff580d" name="submit_c" >ค้นหา</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
   
    <?php  $sql = "SELECT * FROM postmenu";
            $result = $conn->query($sql);
        ?>
<body>
<?php include('Category_s.php'); ?>
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