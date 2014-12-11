<?php
include'header.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Page</title>
</head>

<body>
<div class="header">
  <h1><strong>Registration</strong></h1>
</div>
<div class="form">
  <form id="form1" name="form1" method="post" action="register.php">
    <p>
      <label>Email:
        <input type="text" name="email" id="email" />
      </label>
    </p>
    <p>
      <label>Password:
          <input type="password" name="pass" id="pass" />
      </label>
    </p>
    <p>
      <input type="submit" name="Submit" id="Submit" value="Submit" />
    </p>
  </form>
</div>
</body>
</html>
