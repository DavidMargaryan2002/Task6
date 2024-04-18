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
<div class="title">Categories</div>
<form action="index.php?action=addCategory" method="post">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">New Category</span>
        </div>
        <input type="text" class="form-control" name="category" placeholder="add a new category">
        <button class="btn btn-primary" name="addCategory" role="button">Add</button>
    </div>
</form>
<table class="table mb-0">
    <?php foreach ($allCategory as $category): ?>
        <tr>
            <td><?= $category['category'] ?></td>
            <td><a class="btn btn-primary" href="index.php?id=<?= $category['cat_id'] ?>&action=deleteCategory"
                   role="button">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
