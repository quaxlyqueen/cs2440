<?php

function cart_item($item)
{
  $item = '
    <div class="row">
      <div class="square img_container">
      </div>

      <div class="row space_between">
        <p>' . $item['description'] . '</p>
        <select>
          <input type="number">
        </select>
      </div>
    </div>
  ';

  return $item;
}
