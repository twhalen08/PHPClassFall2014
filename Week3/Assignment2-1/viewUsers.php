<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM users
              ORDER BY id';
    $users = $db->query($query);
?>
<table>
        <tr>
            <th>ID</th>
            <th>Name:</th>
            <th>Phone:</th>
            <th>Email:</th>
            <th>Zipcode:</th>
            <th></th>
            <th></th>
        </tr>
        
    <?php
    foreach ($users as $user) : ?>
                    
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['fullname']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['zip']; ?></td>
                    <td>
                        <form action="delete_user.php" method="post"
                              id="delete_user">
                        <input type="hidden" name="userID"
                               value="<?php echo $user['id']; ?>" />                       
                        <input type="submit" value="Delete" />
                    </form>
                        
                    </td>
                                        <td>
                        <form action="update_user.php" method="post"
                              id="update_user">
                        <input type="hidden" name="userID"
                               value="<?php echo $user['id']; ?>" />
                        <input type="hidden" name="fullname"
                               value="<?php echo $user['fullname']; ?>" />
                         <input type="hidden" name="email"
                               value="<?php echo $user['email']; ?>" />  
                         <input type="hidden" name="phone"
                               value="<?php echo $user['phone']; ?>" />
                        <input type="hidden" name="zip"
                               value="<?php echo $user['zip']; ?>" />                       
                        <input type="submit" value="Update" />
                    </form>
                        
                    </td>
                </tr>
    <?php endforeach;
    ?>