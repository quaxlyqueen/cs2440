<?php

function fetch_catalog()
{
  $conn = get_connection();
  $result = $conn->query('SELECT * FROM product');
  return $result;
}

function fetch_product($id)
{
  $result = exec_stmt('SELECT * FROM product WHERE id = ?', 'i', $id);
  return $result->fetch_assoc();
}
