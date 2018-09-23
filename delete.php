<?php
  require'db.php';

  if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "Delete FROM images where id = '$id'";
    mysqli_query($db,$sql);
    echo "<meta http-equiv='refresh' content = '0;url=Menu.php'>";
  }
 ?>
