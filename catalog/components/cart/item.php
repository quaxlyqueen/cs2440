<?php

function cart_item($item, $q)
{
  $item = '
      <div class="row space_between full_width margin-bottom cart_item">
        <p class="full_width left_align">' . $item['name'] . '</p>
        <div class="row md_width right_align">
          <input type="hidden" value="' . $item['id'] . '">
          <input type="number" value="' . $q . '" class="full_width item_quantity">
          <div class="column center_children">
            <i class="nf nf-cod-trash"></i>
          </div>
        </div>
      </div>
  ';

  return $item;
}
