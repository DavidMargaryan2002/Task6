<nav class="navbar navbar-expand-lg navbar-dark p-3" id="headerNav">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <h1 style="margin-left: 150px; margin-right: 150px">Mobile Center</h1>
                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="index.php?action=cart">Cart</a>
                </li>
                <li class="nav-item dropdown">
                    <?php foreach ($allCategory

                    as $category): ?>
                <li class="nav-item">
                    <a class="nav-link mx-2"
                       href="index.php?action=CategoryPage&id=<?= $category["cat_id"] ?>"><?= $category["category"] ?></a>
                </li>
                <?php endforeach; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>