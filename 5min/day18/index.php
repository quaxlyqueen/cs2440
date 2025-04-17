<!doctype html>
<html lang="en">

<head>
  <title>Dummy Title</title>
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <script src="js/index.js"></script>
</head>

<body>
  <h1>Hello cruel world!</h1>
  <?php
  if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == 'beavis' && $_POST['password'] == 'pass') {
      echo '
  <div class="success">
    <h3>Access Granted</h3>
  </div>
    ';
    } else {
      echo '
  <div class="error">
    <h3>Access Denied</h3>
  </div>
    ';
      echo form();
    }
  } else {
    echo form();
  }

  function form()
  {
    return '
  <form method="post">
    <label for="username">Username:</label>
    <input id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Log In">
  </form>
';
  }
  ?>
</body>

</html>
