<?php
include_once 'functions/init.php';

foreach (array_keys($_SESSION) as $key)
  unset($_SESSION[$key]);

header('Location: .');
