<!doctype html>
<html lang="en">

<head>
  <title>Dummy Title</title>
  <style>
    body {
      margin: 5vw;
    }

    h1 {
      font-size: 8vw;
    }

    #something {
      display: flex;
    }

    img {
      width: 1500px;
    }

    li {
      width: 100px;
      padding: 2vw;
    }
  </style>
</head>

<body>
  <h1>Hello cruel world!</h1>
  <div id="something">
    <ul>
      <?php
for ($i = 0; $i < 30; $i++) {
    echo "<li>Item $i</li>";
}
?>
    </ul>
    <img src="https://images.unsplash.com/photo-1448375240586-882707db888b?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Zm9yZXN0fGVufDB8fDB8fHww" />
  </div>

</body>

</html
