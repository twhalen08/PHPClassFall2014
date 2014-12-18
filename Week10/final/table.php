<?php
include 'database.php';

$query = $db->prepare("SELECT * FROM account");
$query->execute();
$result = $query->fetchAll();
?>
<table border='2'>
    <tr>
    <th>ID</th>
    <th>email</th>
    <th>phone</th>
    <th>heard</th>
    <th>contact</th>
    <th>Comments</th>
    </tr>

<?php

foreach($result as $row)
{
    echo"<tr>
    <th>". $row['id']."</th>
    <th>". $row['email']."</th>
    <th>". $row['phone']."</th>
    <th>". $row['heard']."</th>
    <th>". $row['contact']."</th>
    <th>". $row['comments']."</th>
    </tr>";
}
