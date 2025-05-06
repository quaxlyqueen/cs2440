<?php
function login_form()
{
  $form = '
    <div class="glass center center_children padding md_width">
      <form method="post" id="login_form" class="card full_width padding" style="height: auto;">
        <div class="column center">
          <div class="column margin-bottom">
            <label for="username">Username:</label>
            <input id="username" name="username" autofocus required>
          </div>

          <div class="column margin-bottom">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
          </div>

          <a href="create-account.php" class="margin-bottom">Signup Instead</a>

          <input type="submit" class="button submit" id="login_submit">
        </div>
        <div class="column center error">
          <p id="invalid"></p>
        </div>
      </form>
    </div>
  ';

  return $form;
}
