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
        </tr>
        
    <?php
    foreach ($users as $user) : ?>
                    
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['fullname']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['zip']; ?></td>
                </tr>
    <?php endforeach;
    ?>