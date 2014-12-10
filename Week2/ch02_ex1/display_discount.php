<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div id="content">
        <h1>Product Discount Calculator</h1>
        <?php
        $product_description = $_POST['product_description'];
        $list_price = $_POST['list_price'];
        $list_price_f = '$'.number_format($list_price, 2);
        $discount_percent = $_POST['discount_percent'] / 100;
        $discount_percent_formatted = $_POST['discount_percent'].'%';
        $discount = $list_price * $discount_percent;
        $discount_f = '$'.number_format($discount, 2);
        $discount_price = $list_price - $discount;
        $discount_price_f = '$'.number_format($discount_price, 2);
        ?>

        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br />

        <label>List Price:</label>
        <span><?php echo $list_price_f; ?></span><br />

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br />

        <label>Discount Amount:</label>
        <span><?php echo $discount_f; ?></span><br />

        <label>Discount Price:</label>
        <span><?php echo $discount_price_f; ?></span><br />

        <p>&nbsp;</p>
    </div>
</body>
</html>