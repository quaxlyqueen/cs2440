<?php
$nav = '
  <nav>
    <ul>
      <div class="row space_between">
        <div>
          <li><a href="catalog.php">Products</a></li>
        </div>

        <div class="absolute_h_center">
          <a href="index.php"><h4>ACME Store</h4></a>
        </div>

        <div>
          ' . (isset($_SESSION['id']) ? '<li><a href="cart.php">Cart</a></li>' : '') . '
          ' . (isset($_SESSION['id']) ? '<li><a href="logout.php">Logout</a></li>' : '') . '
          ' . (!isset($_SESSION['id']) ? '<li><a href="index.php">Login</a></li>' : '') . '
          ' . (!isset($_SESSION['id']) ? '<li><a href="create-account.php">Signup</a></li>' : '') . '
        </div>
      </div>
    </ul>
  </nav>
';

echo $nav;
