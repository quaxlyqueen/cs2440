  </body>

  <footer>

    <?php
    $scripts = '';
    switch ($_SERVER['SCRIPT_NAME']) {
        case '/index.php':
            $scripts .= '<script src="js/login.js"></script>';
            break;
    }

    echo $scripts;
    ?>

  </footer>

  </html>
