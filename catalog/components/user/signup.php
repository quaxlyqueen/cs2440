<?php
function signup_form()
{
  $form = '
    <div class="glass center md_width padding">
      <form method="post" class="card column center full_width padding" style="height: auto;">
        <div class="column margin-bottom">
          <label for="username">Username:</label>
          <input id="username" name="username" autofocus required>
        </div>

        <div class="column margin-bottom">
          <label for="password">Password:</label>
          <input id="password" type="password" name="password" required>
        </div>

        <div class="column margin-bottom">
          <label for="v_password">Verify Password:</label>
          <input id="v_password" type="password" name="v_password" required>
        </div>

        <a href="index.php" class="margin-bottom">Login Instead</a>

        <div class="row space_between full_width">
          <input type="submit" class="button submit" value="Create">
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
