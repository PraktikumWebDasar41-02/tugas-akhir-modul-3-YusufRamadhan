<?php
  require'db.php';
  $id=$_GET['id'];
  $select = mysqli_query($db, "SELECT * FROM images WHERE id='$id'");
  $row = mysqli_fetch_assoc($select);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
  </head>
  <body>
    <form method="post" action="" enctype="multipart/form-data">
      <table>
        <tr>
          <td>ID</td>
          <td><?php echo $row['id']; ?></td>
        </tr>
        <tr>
          <td>image</td>
          <td><img src="<?php echo $row['pic'];?>" style = "width:400px"></td>
        </tr>
        <tr>
          <td><input type="file" name="newpic"></td>
          <td><input type="submit" value="update" name="update"></td>
        </tr>
      </table>
    </form>
  </body>
</html>

<?php
  if(isset($_POST['update'])){
    $pic = "img/".$_FILES['newpic']['name'];

    move_uploaded_file($_FILES['newpic']['tmp_name'],$pic);
    mysqli_query($db,"update images set pic = '$pic' WHERE id = '$id'");

    header("Location: Menu.php");
  }
?>
