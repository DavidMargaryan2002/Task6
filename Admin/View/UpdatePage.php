<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Update page</h1>
<?php foreach ($productById as $product): ?>
<form method="post" action="index.php?action=UpdateProduct&id=<?= $product['id'] ?>&image=<?= $product['image_path'] ?>"
      enctype="multipart/form-data">
    <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control" aria-label="Small"
           aria-describedby="inputGroup-sizing-sm" placeholder="Product name">
    <input type="text" name="description" value="<?= $product['description'] ?>" class="form-control" aria-label="Small"
           aria-describedby="inputGroup-sizing-sm" placeholder="Description">
    <input type="text" name="price" value="<?= $product['price'] ?>" class="form-control" aria-label="Small"
           aria-describedby="inputGroup-sizing-sm" placeholder="Price">
    <input type="number" name="quantity" value="<?= $product['quantity'] ?>" class="form-control" aria-label="Small"
           aria-describedby="inputGroup-sizing-sm" placeholder="Quantity">
    <input type="File" name="image" value="<?= $product['image_path'] ?>" class="form-control" aria-label="Small"
           aria-describedby="inputGroup-sizing-sm" placeholder="Product image">
    <?php endforeach; ?>
    <select class="form-select" aria-label="Default select example" name="category">
        <?php foreach ($allCategory as $category): ?>
            <option value="<?= $category['cat_id'] ?>"><?= $category['category'] ?></option>
        <?php endforeach; ?>
    </select>
    <button class="btn btn-primary" name="addProduct" role="button">Update</button>
</form>
</body>
</html>
