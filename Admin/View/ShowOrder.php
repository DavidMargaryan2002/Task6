<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="View/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="View/Public/Css/image.css">
    <link rel="stylesheet" href="View/Public/Css/show.css">
    <title>Home</title>
</head>
<body>
<br>
<div class="order-container">
    <h1 class="title_name"><?= $_GET['name'] ?> -ի ընդհանուր գնումները</h1>
    <div class="row">
        <?php foreach ($product as $val => $key): ?>
            <div class="product-card">
                <img class="card-img-top" src="View/Public/Images/<?= $key['image_path'] ?>" alt="Card image cap">
                <div>
                    <h5 class="card-title"><?= $key['name'] ?></h5>
                    <h5 class="price"><?= $key['price'] ?> դրամ</h5>
                    <p class="card-text"><?= $key['description'] ?></p>
                    <p class="card-text">There are <?= $key['quantity'] ?> items in the range</p>
                    <p> Քանակը <?= $productQuantity[$val] ?> </p>
                    <p class="price">Ընդհանուր <?= $productQuantity[$val] * $key['price'] ?> դրամ</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <h1 class="total_price">Ընդհանուր արժեքը <?= $_GET['price'] ?> դրամ</h1>
</div>

</body>
</html>