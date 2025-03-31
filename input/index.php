<?php
if (isset($_POST['first_name']))
  $first_name = $_POST['first_name'];
if (isset($_POST['last_name']))
  $last_name = $_POST['last_name'];
if (isset($_POST['email']))
  $email = $_POST['email'];
if (isset($_POST['phone_number']))
  $phone_number = $_POST['phone_number'];
?>
<!doctype html>
<html lang="en">

<head>
  <title>Input</title>
  <link href="input/css/styles.css" rel="stylesheet" type="text/css">
  <script src="input/js/index.js"></script>
</head>

<body>
  <h1>Input Assignment</h1>
  <?php
  if ($first_name || $last_name || $email || $phone_number) {
    echo '
      <div id="confirmation">
        <h3>Thank you for contacting me!</h3>
        <h5>Your submitted information is:</h5>
        <div id="information">
          <p><strong>Name: </strong>' . $last_name . ', ' . $first_name . '</p>
          <p><strong>Email: </strong>' . $email . '</p>
          <p><strong>Phone: </strong>' . $phone_number . '</p>
        </div>
      </div>
    ';
  } else {
    echo '
      <div id="form">
        <form method="post">
          <div class="row">
            <input name="first_name" type="text" placeholder="Josh">
            <input name="last_name" type="text" placeholder="Ashton">
          </div>
          <div class="row">
            <input name="email" type="email" placeholder="me@joshashton.dev">
            <input name="phone_number" type="text" placeholder="123 456 7890">
          </div>
          <button>Submit</button>
        </form>
      </div>
';
  }
  ?>
</body>

</html>
