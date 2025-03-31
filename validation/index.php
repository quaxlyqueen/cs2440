<?php
$error = '';
if (isset($_GET['error']))
  $error = $_GET['error'];
?>

<!doctype html>
<html lang="en">

<head>
  <title>Validation</title>
  <link href="validation/css/styles.css" type="text/css" rel="stylesheet">
  <script src="validation/js/index.js"></script>
</head>

<body>
  <h1>Validation Assignment</h1>

  <form action="validation/process.php" method="post">
    <input name="phone_number" type="text" placeholder="(xxx)xxx-xxxx" <?php $error ? 'value="' . $error . '"' : '' ?>>
    <div class="row">
      <button>Submit</button>
      <button type="reset" class="reset">Reset</button>
    </div>
  </form>

  <?php
  if ($error) {
    echo '
      <div class="card error">
        <h3 class="error">Invalid Format</h3>
        <p class="error">You entered: ' . $error . '</p>
        <p class="error">Phone number must be formatted as (xxx)xxx-xxxx.</p>
      </div>
    ';
  }
  ?>
</body>

</html>
