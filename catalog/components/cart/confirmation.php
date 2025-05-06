<?php

function cart_confirmation($fname, $lname, $add, $city, $state, $zip, $total, $items)
{
  $con = '
        <div class="glass column md_width center padding margin-top" style="height: auto; max-height: 750px; overflow-y: auto;">
          <div class="card full_width padding column center" style="height: auto;">
            <h4>Shipping Details:</h4>
            <p>' . $fname . ' ' . $lname . '</p>
            <p>' . $add . '</p>
            <p>' . $city . ', ' . $state . ' ' . $zip . '</p>
            <br>
            <p>Your order will spontaneously appear before you, for you convenience!</p>
            <small>We fold space and time itself, to ensure the best experience for our customers!</small>
            <div class="line"></div>
            <h4>Your Items:</h4>
            <ul>
  ';

  foreach ($items as $name => $quantity)
    $con .= '<li>x' . $quantity . ' - ' . $name . '</li>';

  $con .= '
      </ul>
      <h5>Total: ' . format_money($total) . '</h5>
    </div>
  ';

  return $con;
}
