<?php
function login_form()
{
  $form = '
    <div class="card center">
      <form method="post" id="login_form">
        <div class="column center">
          <div class="column">
            <label for="username">Username:</label>
            <input id="username" name="username" autofocus required>
          </div>

          <div class="column">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
          </div>

          <a href="create-account.php">Signup Instead</a>

          <input type="submit" class="button submit" id="login_submit">
        </div>
      </form>
    </div>
  ';

  return $form;
}
