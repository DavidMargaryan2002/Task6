<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="View/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="View/Public/Css/image.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="index.php">Main page</a>
    <select class="btn btn-mini" onchange="window.location.href=this.value">
        <option>Categories</option>
        <?php foreach ($allCategory as $category): ?>
            <option value="index.php?action=getProductByCategory&id=<?= $category["cat_id"] ?>"><?= $category["category"] ?></option>
        <?php endforeach; ?>
    </select>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=order">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=addProductPage">| Add a product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=addCategoryPage">| Add or delete a category |</a>
            </li>
        </ul>
        <div style="margin-left:70%"><a class="btn btn-primary" href="index.php?action=logOut" role="button">Log Out</a>
        </div>
    </div>
</nav>
</body>
</html>
