<?php
function catalog_grid($products)
{
  $grid = '
    <div class="grid center">
  ';

  foreach ($products as $p)
    $grid .= product_card($p);

  $grid .= '
    </div>
  ';

  return $grid;
}
