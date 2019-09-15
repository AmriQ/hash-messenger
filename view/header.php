<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="view/style.css">
    <title>Hash Messenger</title>
  </head>
  <body>
    <header>
      <h1>Hash Messenger</h1>
      <?php if (!isset($_SESSION['user'])) { ?>
        <a href="login.php">login</a>
        <a href="register.php">register</a>
      <?php } else { ?>
        <a href="index.php">home</a>
        <a href="inbox.php">inbox</a>
        <a href="dekrip.php">dekrip</a>
        <a href="logout.php">logout</a>
      <?php } ?>
    </header>
