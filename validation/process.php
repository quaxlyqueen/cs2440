<!doctype html>
<html lang="en">

<head>
  <title>Dummy Title</title>
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <script src="js/index.js"></script>
</head>

<body>
  <h1>Validation Assignment</h1>
<?php
validate($_POST['phone_number']);
?>

</body>

</html>

<?php
function validate($number)
{
    // Valid format: (999)999-9999
    $valid_format_regex = '/[(]\d{3}[)]\d{3}-\d{4}/';
    if (preg_match($valid_format_regex, $number)) {
        echo '
        <div class="card success">
          <h3 class="success">Thank You!</h3>
          <p class="success">You entered: ' . $number . ', a valid phone number.</p>
          <img src="img/success.jpg" />
        </div>
';
    } else {
        header('Location: .?error=' . $number);
    }
}
?>
