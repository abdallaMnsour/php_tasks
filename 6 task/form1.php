<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  foreach ($_POST as $key => $value) {
    if ($value != '') {
      echo $key . ' is : ' . $value . '<br>';
    }
  };
  echo '======================================';
}
?>

<style>
  * {
    margin: 10px;
  }

  div {
    width: 300px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
</style>

<form method="post">
  <label for="username">username</label>
  <input type="text" name="username" id="username">
  <br>

  <label for="password">password</label>
  <input type="password" name="password" id="password">
  <br>

  <label for="city">city of</label>
  <input type="text" name="city" id="city">
  <br>

  <label for="server">web server</label>
  <select name="server_name" id="server">
    <option selected>-- choose a server --</option>
    <option value="1">united state</option>
    <option value="2">egypt</option>
    <option value="3">japan</option>
    <option value="4">china</option>
  </select>
  <br>

  <div>
    <span>you'r role</span>
    <span>
      <input type="radio" name="role" id='admin' value="admin" />
      <label for="admin">admin</label>
      <br>
      <input type="radio" name="role" id='engineer' value="engineer" />
      <label for="engineer">engineer</label>
      <br>
      <input type="radio" name="role" id='manager' value="manager" />
      <label for="manager">manager</label>
      <br>
      <input type="radio" name="role" id='guest' value="guest" />
      <label for="guest">guest</label>
      <br>
    </span>
  </div>

  <div>
    <span>sign-on</span>
    <span>
      <input type="checkbox" name="sign_on" id="mail" value="mail" />
      <label for="mail">mail</label>
      <br>
      <input type="checkbox" name="sign_on" id="payroll" value="payroll" />
      <label for="payroll">payroll</label>
      <br>
      <input type="checkbox" name="sign_on" id="self_service" value="self" />
      <label for="self_service">self-service</label>
      <br>
    </span>
  </div>

  <button>login</button>
  <input type="reset" value="reset" />
</form>