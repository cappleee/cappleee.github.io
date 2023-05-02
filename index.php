<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $submitted_code = $_POST['code'];
  $generated_code = $_SESSION['code'];
  if ($submitted_code == $generated_code) {
    echo 'Code is correct!';
  } else {
    echo 'Code is incorrect!';
  }
  exit();
}

$code = rand(100000, 999999);

$_SESSION['code'] = $code;

?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <form method="POST">
    <H1><input type="text" name="username" placeholder="Username/Email">
    <input type="password" name="password" placeholder="Password"></H1>
    <label for="code">Verification Code:</label>
    <input type="text" id="code" name="code" maxlength="6" required>
    <h2><button type="submit">Login</button></h2>
  </form>
  <p>The verification code is: <?php echo $code; ?></p>
</body>
</html>
