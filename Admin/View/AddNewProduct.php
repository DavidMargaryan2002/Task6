<!DOCTYPE html>
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
<div class="title">
    Products
</div>
<form method="post" action="index.php?action=addProduct" enctype="multipart/form-data">
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Product Name</span>
        </div>
        <input type="text" name="name" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
               placeholder="Product Name">
    </div>
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Description</span>
        </div>
        <input type="text" name="description" class="form-control" aria-label="Small"
               aria-describedby="inputGroup-sizing-sm" placeholder="Description">
    </div>
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Price</span>
        </div>
        <input type="text" name="price" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
               placeholder="Price">
    </div>
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Quantity</span>
        </div>
        <input type="number" name="quantity" class="form-control" aria-label="Small"
               aria-describedby="inputGroup-sizing-sm" placeholder="quantity">
    </div>
    <div class="input-group input-group-sm mb-3">
        <input type="File" name="image" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    </div>
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Categories</span>
        </div>
        <select class="form-select" aria-label="Default select example" name="category">
            <?php foreach ($allCategory as $category): ?>
                <option value="<?= $category['cat_id'] ?>"><?= $category['category'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button class="btn btn-primary" name="addProduct" role="button">Add</button>
</form>
</body>
</html>
