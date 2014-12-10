<?php
$error_message = "";
    // get the data from the form
    $investment = $_POST['investment'];
    $interest_rate = $_POST['interest_rate'];
    $years = $_POST['years'];
    
    $investment_rand = $_POST['investment_rand'];
    $interest_rand = $_POST['interest_rand'];   
    $years_rand = $_POST['years_rand'];
    
        ?>
<a href="index.php">Start Over >> </a> 
    
    <?php
    if ($investment === $investment_rand || $interest_rate === $interest_rand || $years_rand === $years)
    {
        echo $years_rand;
        echo $years;
        $error_message .= '<p class="error">The default values cannot be used for a calculation. Please use your own values!</p>';
    
    }

    // validate investment entry
    if ( empty($investment) ) {
        $error_message .= '<p class="error">Investment is a required field.</p>'; }
    if ( !is_numeric($investment) )  {
        $error_message .= '<p class="error">Investment must be a valid number.</p>'; }
    if ( $investment <= 0 ) {
        $error_message .= '<p class="error">Investment must be greater than zero.</p>'; }

    // validate interest rate entry
    if ( empty($interest_rate) ) {
        $error_message .= '<p class="error">Interest rate is a required field.</p>'; }
    if ( !is_numeric($interest_rate) )  {
        $error_message .= '<p class="error">Interest rate must be a valid number.</p>'; }
    if ( $interest_rate <= 0 or $interest_rate > 15) {
        $error_message .= '<p class="error">Interest rate must be greater than zero and less than or equal to 15.</p>'; }
    
    // validate years entry
    if ( empty($years) ) {
        $error_message .= '<p class="error">Number of years is a required field.</p>'; }
    if ( !is_numeric($years) )  {
        $error_message .= '<p class="error">Number of years must be a valid number.</p>'; }
    if ( $years <= 0 or $years > 50) {
        $error_message .= '<p class="error">Number of years be greater than zero and less than or equal to 50.</p>'; }



    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }
        // set error message to empty string if no invalid entries
    else {
        $error_message = ''; }

    // calculate the future value
    $future_value = $investment;
    for ($i = 1; $i <= $years; $i++) {
        $future_value = ($future_value + ($future_value * $interest_rate *.01));
    }
    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br />

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br />

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br />

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br />
        
        <label>This calculation was done on: </label>
        <span><?php echo date("m/d/y h:i:s A"); ?></span><br />
    </div>
</body>
</html>