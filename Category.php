<?php session_start();
require_once("dbcon.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>หมวดหมู่</title>
    <link rel="stylesheet" href="decorate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('Taskbar.php'); ?>
    <?php include('t.php'); ?>
    
</head>
<?php include('Category_s.php'); ?>
</body>
<footer class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p class="text-muted">&copy; 2021. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </footer>
</html>