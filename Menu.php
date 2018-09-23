<!DOCTYPE html>
<?php
  require'db.php';
  session_start();
    if (isset($_POST['Kirim'])) {
      $user = $_POST['name'];
      $pass = md5($_POST['pass']);
      $login = mysqli_query($db,"SELECT * FROM user_data WHERE Username = '$user' AND Password = '$pass'");
      $fetch = mysqli_fetch_array($login);

      if ($user == $fetch['Username'] && $pass == $fetch['Password']) {
        echo '<script language="javascript"> alert ("login berhasil");</script>';
      }
      else {
        echo '<script language="javascript"> alert ("login gagal password/username salah");</script>';
      }
    }
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div id = "content">
      <form method="post" action="Menu.php" enctype="multipart/form-data">
        <div>
          <input type="file" name="image" value=""><br>
          <input type="submit" name ="submit">
          <a href="Login.php">Log-out</a>
        </div>
      </form>
    </div>
<?php
  if(isset($_POST['submit'])){
    $pic = "img/".$_FILES['image']['name'];
    $sql = "INSERT INTO images(pic) VALUES ('$pic')";
    mysqli_query($db,$sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'],$pic)) {
      echo "Upload Success!";
    }else {
      echo "Upload Fail...";
    }
  }

 ?>
    <div id= "table">
      <?php
      require 'db.php';
      $query = "SELECT * FROM images";
      $result = mysqli_query($db,$query);
      while ($row = mysqli_fetch_array($result)) {

      ?>

          <tr>
            <td><?php echo $row['id'];?></td>
              <td> <img src="<?php echo $row['pic'];?>" style = "width:400px"></td>
              <td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></button>
              <td><a href="delete.php?del=<?php echo $row['id'];?>">Delete<br></td>
        <?php

        } ?>
          </tr>
        </table>
    </div>
  </body>
</html>
