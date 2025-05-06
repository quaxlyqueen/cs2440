<?php

function cart_checkout($total)
{
  $checkout = '
    <div class="card full_width column padding shadow margin-top" style="height: auto;">
      <form method="post">
        <input type="hidden" name="form_id" value="checkout">
        <div class="row full_width space_between margin-top margin-bottom">
          <div class="column md_width">
            <label for="fname">First Name:</label>
            <input id="fname" name="fname" placeholder="John" required>
          </div>
    
          <div class="column md_width">
            <label for="lname">Last Name:</label>
            <input id="lname" name="lname" placeholder="Smith" required>
          </div>
        </div>
  
        <div class="column full_width">
          <label for="add">Address:</label>
          <input id="add" name="add" placeholder="123 Example St" required>
        </div>
        
        <div class="row space_between margin-top margin-bottom">
          <div class="column md_width">
            <label for="city">City:</label>
            <input id="city" name="city" placeholder="Salt Lake City" required>
          </div>
          <div class="column sm_width">
            <label for="state">State:</label>
            <select id="state" name="state" required>
              <option value="AL">AL</option>
              <option value="AK">AK</option>
              <option value="AZ">AZ</option>
              <option value="AR">AR</option>
              <option value="CA">CA</option>
              <option value="CO">CO</option>
              <option value="CT">CT</option>
              <option value="DE">DE</option>
              <option value="FL">FL</option>
              <option value="GA">GA</option>
              <option value="HI">HI</option>
              <option value="ID">ID</option>
              <option value="IL">IL</option>
              <option value="IN">IN</option>
              <option value="IA">IA</option>
              <option value="KS">KS</option>
              <option value="KY">KY</option>
              <option value="LA">LA</option>
              <option value="ME">ME</option>
              <option value="MD">MD</option>
              <option value="MA">MA</option>
              <option value="MI">MI</option>
              <option value="MN">MN</option>
              <option value="MS">MS</option>
              <option value="MO">MO</option>
              <option value="MT">MT</option>
              <option value="NE">NE</option>
              <option value="NV">NV</option>
              <option value="NH">NH</option>
              <option value="NJ">NJ</option>
              <option value="NM">NM</option>
              <option value="NY">NY</option>
              <option value="NC">NC</option>
              <option value="ND">ND</option>
              <option value="OH">OH</option>
              <option value="OK">OK</option>
              <option value="OR">OR</option>
              <option value="PA">PA</option>
              <option value="RI">RI</option>
              <option value="SC">SC</option>
              <option value="SD">SD</option>
              <option value="TN">TN</option>
              <option value="TX">TX</option>
              <option value="UT">UT</option>
              <option value="VT">VT</option>
              <option value="VA">VA</option>
              <option value="WA">WA</option>
              <option value="WV">WV</option>
              <option value="WI">WI</option>
              <option value="WY">WY</option>
            </select>
          </div>
          <div class="column sm_width">
            <label for="zip">Zip Code:</label>
            <input id="zip" name="zip" placeholder="84111" required>
          </div>
        </div>
        <div class="line margin-bottom"></div>
        <div class="column center center_children">
          <div class="row space_between full_width">
            <h3>Total:</h3>
            <h3 id="total">' . format_money($total) . '</h3>
          </div>
          <input type="submit" value="Place Order" class="sm_width margin-top padding">
        </div>
      </form>
    </div>
  ';

  return $checkout;
}
