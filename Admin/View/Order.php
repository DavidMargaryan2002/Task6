<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="View/Public/Css/title.css">
    <title>Document</title>
</head>
<body>
<div class="order-cont"><h1>Գնումներ</h1></div>
<?php foreach ($order as $val): ?>
    <div class="order-container">
    <h1><?= $val['name'] . " " . $val['surname'] ?></h1>
    <h2><?= $val['email'] ?></h2>
    <h3><?= $val['order_date'] ?></h3>
    <h3><?= $val['total'] ?> դրամ</h3>
    <a class="show"
       href="index.php?action=showOrder&id=<?= $val['id'] ?>&name=<?= $val['name'], $val['surname'] ?>&price=<?= $val['total'] ?>">Show</a>
    </div><?php endforeach; ?>
</body>
</html>


