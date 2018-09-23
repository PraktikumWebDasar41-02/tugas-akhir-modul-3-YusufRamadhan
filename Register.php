<?php
  require'db.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body><center>
    <form action="Register.php" method="post">
			Username <input type="text" name="user" value=""><br>
			Password &nbsp<input type="password" name="pass" value=""><br>
      NIM <input type = "text" name="NIM"><br>
			<input type="Submit" name="Kirim"><br>
		</form>
    <a href="Login.php">Back to main page!</a>
  </center></body>
</html>

<?php
  if (isset($_POST['Kirim'])) {
    $username = $_POST['user'];
    $Password = md5($_POST['pass']);
    $nim = $_POST['NIM'];
    $sql = "INSERT INTO user_data(Username, Password, NIM) VALUES ('$username','$Password','$nim')";
    mysqli_query($db,$sql);
  }
 ?>
