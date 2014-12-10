<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <?php
            if ( !empty($_POST) ) {
                echo $_POST['fullname'];
            }
            
            
            $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
           $statement = $pdo->query("SELECT * FROM USERS");
            var_dump($statement ->fetch());
        ?>
        
        <form action="#" method="post">            
            <input type="text" name="fullname" value="" />            
            <input type="submit" value="submit" />            
        </form>
        
        
       
    </body>
</html>