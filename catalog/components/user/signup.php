<?php
function signup_form()
{
  $form = '
    <div class="card center">
      <form method="post" class="column center">
        <div class="column">
          <label for="username">Username:</label>
          <input id="username" name="username" autofocus required>
        </div>

        <div class="column">
          <label for="password">Password:</label>
          <input id="password" type="password" name="password" required>
        </div>

        <div class="column">
          <label for="v_password">Verify Password:</label>
          <input id="v_password" type="password" name="v_password" required>
        </div>

        <a href="index.php">Login Instead</a>

        <div class="row full_width">
          <input type="submit" class="button submit">
          <input type="reset" class="button">
        </div>

        <div class="column center error">
          <p id="err_username"></p>
          <p id="err_match"></p>
          <p id="err_length"></p>
          <p id="err_num"></p>
        </div>
      </form>
    </div>
  ';

  return $form;
}
