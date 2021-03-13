
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
</head>
<body>
<?php
  
  include "dbcon.php";
  
  $sql = "SELECT * FROM user WHERE id= '{$_SESSION['id']}'";
  $result = $conn->query($sql);

  $sql_menu ="SELECT * FROM menu";
  $result_menu=$conn->query($sql_menu);
  $row_menu = $result_menu->fetch_assoc();
?>
<form action="search.php" method="get">
 <nav class="navbar navbar-expand-lg navbar-light bg-#fff">
 
 <div class="container">
        <a href="index.php" class="navbar-brand"><img src="img\Pizza.png" width="100"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="input-group">
    <div class="input-group-text" id="btnGroupAddon" ><img src="img\loupe.png" width="10"></div>
    <input type="text" class="form-control" placeholder="ค้นหาสูตรอาหาร" name="search" >
  </div>
</div>
</form>
        <div class="collapse navbar-collapse" id="navbarToggler">
          <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item">
              <a href="index.php" class="nav-link active" aria-current="page">หน้าแรก</a>
            </li>
            <li class="nav-item">
              <a href="Category.php" class="nav-link">สูตรอาหาร</a>
            </li>
            
            
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            หมวดหมู่
            
          </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <?php while($row_menu=$result_menu->fetch_assoc()){?>
            <li><a class="dropdown-item" href="show_menu.php?menu_id=<?php echo $row_menu['menu_id']; ?>"><?php echo $row_menu['menu_name']?></a></li>
            <?php }?>
          </ul>
        </li>
    
            
            <?php while($row = $result->fetch_assoc()) {
 
 ?>
 <li class="nav-item" >
            <div class="dropdown">
  <img src="imguser/<?php echo $row['user_img'] ?>" width="50" height="50" style="border-radius: 50%;" id="dropdownMenu2" data-bs-toggle="dropdown" > 
  </img>
 
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" a href="profil_user_admin.php"><?php echo $row['username'] ?></a></li>
            <li><a class="dropdown-item" href="Fromadd.php">เพิ่มสูตรอาหาร</a></li>
            <form action="index.php" method="post">
              <button type="submit" name="logout">ออกจากระบบ</button>
            </form>
          </ul>
          <?php } ?>
</div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
<script src="js/bootstrap.min.js"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-604774d6224bec05"></script>
</body>

</html>