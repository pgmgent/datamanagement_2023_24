<?php
require_once '../app.php';
include_once "$dir/partial/header.php";


//Todo: controle op login en session aanmaken

?>

<h1>Login</h1>

<form method="POST">
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword">
    </div>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



<?php

include_once "$dir/partial/footer.php";
