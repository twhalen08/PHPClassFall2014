<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "my page title"; ?></title>
    </head>
    <body>
        
        <?php echo "<h1><em>my page title</em></h1>"; ?>
        
        <?php
        // put your code here
        //phpinfo();
        
            $text = '<p><em>Test paragraph.</em></p><!-- Comment --> <a href="#fragment">Other text</a>';
            echo strip_tags($text);
            echo "\n";

            // Allow <p> and <a>
            echo strip_tags($text, '<p><a>');
        ?>
        
    </body>
</html>