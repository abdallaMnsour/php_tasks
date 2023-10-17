<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  foreach ($_POST as $key => $value) {
    if ($value != '') {
      echo $key . ' is : ' . $value . '<br>';
    }
  }
  echo '================================';
}
?>

<form method="post">
  <label for="salutation">Salutation</label><br>
  <select name="salutation" id="salutation">
    <option selected>-- none --</option>
    <option value="1">one</option>
    <option value="2">two</option>
    <option value="3">three</option>
  </select><br>

  <label for="fname">First name : </label>
  <input type="text" name="fname" id="fname" /><br>
  
  <label for="lname">Last name : </label>
  <input type="text" name="lname" id="lname" /><br>
  
  <div>Gender</div>
  <label for="male">male : </label>
  <input type="radio" name="gender" id="male" />
  <label for="female">female : </label>
  <input type="radio" name="gender" id="female" /><br>
  
  <label for="email">Email : </label>
  <input type="email" name="email" id="email" /><br>
  
  <label for="date">Date of birth : </label>
  <input type="date" name="date" id="date" /><br>
  
  <label style="display: block" for="address">Address : </label>
  <textarea name="address" id="address" cols="30" rows="10"></textarea><br>
  
  <button>Submit</button>
</form>