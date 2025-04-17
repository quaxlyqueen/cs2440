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

  $user = 'beavis';
  $pass = 'pass';

  if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $user && $_POST['password'] == $pass)
      echo '<h1>Access Granted</h1>';
    else
      echo '<h1>Access Denied</h1>' . login_form();
  } else
    echo login_form();

  function login_form()
  {
    $form = '
      <form method="post">
        <label for"username">Username:</label>
        <input id="username" name="username" required>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>

        <input type="submit">
    ';

    return $form;
  }
  ?>
</body>

</html>
