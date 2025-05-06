<?php

function cart_item($item, $q)
{
  $item = '
    <tr class="cart_item">
      <input type="hidden" value="' . $item['id'] . '">
      <td class="md_width">' . $item['name'] . '</td>
      <td><input type="number" value="' . $q . '" class="full_width item_quantity"></td>
      <td>' . format_money($item['price']) . '</td>
      <td class="item_total">' . format_money($item['price'] * $q) . '</td>
      <td><i class="nf nf-cod-trash"></i></td>
    </tr>
  ';

  return $item;
}
