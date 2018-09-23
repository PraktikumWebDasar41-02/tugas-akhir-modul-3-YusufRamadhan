<?php
  require'db.php';
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Login page</h1>
    <form action="Menu.php" method="post">
			Username <input type="text" name="name" value=""><br>
			Password &nbsp<input type="password" name="pass" value=""><br>
			<input type="Submit" name="Kirim" value="Kirim"><br>
		</form>
    <a href="Register.php">Create Account!</a>
  </body>
</html>
