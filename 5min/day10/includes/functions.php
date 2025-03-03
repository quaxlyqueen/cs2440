<?php
function generateForm($fields)
{
    $form = '
      <form method="post">
    ';

    foreach ($fields as $key => $ex) {
        $display = ucwords(str_replace('-', ' ', $key));

        $form .= '
          <div class="row">
          <label for="' . $key . '">' . $display . '</label>
        ';
        $form .= '
          <input id="' . $key . 'placeholder="' . $ex . '>
        </div>';
    }
    $form .= '<input type="submit">';

    $form .= '
      </form>
    ';

    return $form;
}
?>
