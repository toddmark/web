<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2.14</title>
</head>

<body>
  <p>
    月份是 <?php echo date("M"); ?>
  </p>
  <p>
  本月还剩多少天: <?php echo date("t") - date("d");  ?>
  </p>
  <p>
    本年还剩几个月 <?php echo 12 - date("n"); ?>
  </p>

</body>

</html>
