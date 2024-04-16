<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="View/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="View/Public/Css/image.css">
    <title>Categories</title>
</head>
<body>
<br>
<div class="row">
    <?php foreach ($productByCategory as $products): ?>
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="View/Public/Images/<?= $products['image_path'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $products['name'] ?></h5>
                    <p class="card-text"><?= $products['description'] ?></p>
                    <p class="card-text">There are <?= $products['quantity'] ?> items in the range</p>
                    <a href="index.php?id=<?= $products['id'] ?>&image=<?= $products['image_path'] ?>&action=deleteProduct"
                       class="btn btn-primary">Delete</a>
                    <a href="index.php?id=<?= $products['id'] ?>&action=updatePage" class="btn btn-primary">Update</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
