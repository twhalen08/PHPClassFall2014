<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    
    <?php
        $investment_rand = rand( 1, 100000 );
    $interest_rand = rand( 1, 100 );
    $years_rand = rand( 1, 50 );
    $investment = $investment_rand;
    $interest_rate = $interest_rand;
    $years = $years_rand;

    
    
   
    
    ?>
    <div id="content">
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="display_results.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
                   value="<?php
                   echo $investment; ?>"/><br />

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php echo $interest_rate; ?>"/><br />

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo $years; ?>"/><br />
            <input type="hidden" name="investment_rand" value="<?php echo $investment_rand;?>"/>
            <input type="hidden" name="interest_rand" value="<?php echo $interest_rand;?>"/>
            <input type="hidden" name="years_rand" value="<?php echo $years_rand;?>"/>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br />
        </div>

    </form>
    </div>
</body>
</html>