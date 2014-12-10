<?php

$uid = $_POST['userID'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$zip = $_POST['zip'];
?>
    <html>
    <head>
        <title>Update User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

            <form action="update-exec.php" method="post">

                <label>Name:</label>
                <input type="input" name="fullname" value="<?php echo $fullname; ?>"/>
                <br />

                <label>Phone:</label>
                <input type="input" name="phone" value="<?php echo $phone; ?>" />
                <br />

                <label>Email:</label>
                <input type="input" name="email"  value="<?php echo $email; ?>"/>
                <br />
                
                <label>Zip-Code:</label>
                <input type="input" name="zip" value="<?php echo $zip; ?>" />
                <br />
                 <input type="hidden" name="userID"
                               value="<?php echo $uid; ?>" />
                
                <label>&nbsp;</label>
                <input type="submit" value="Update User" />
                <br />
            </form>
    </body>
</html>
