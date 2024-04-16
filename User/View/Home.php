<main>
    <div class="row">
        <?php foreach ($allProducts as $products): ?>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img class="card-img-top" src="View/Public/Images/<?= $products['image_path'] ?>"
                         alt="Card image cap">
                    <div class="card-body" id="<?= $products['id'] ?>">
                        <h5 class="card-title"><?= $products['name'] ?></h5>
                        <h5 class="card-title price" id="<?= $products['price'] ?>"><?= $products['price'] ?> AMD</h5>
                        <p class="card-text"><?= mb_substr($products['description'], 0, 50) ?></p>
                        <p class="card-text">There are <?= $products['quantity'] ?> items in the range</p>
                        <button class="btn btn-success addCart" onclick="addToCart(this)">Add to Cart</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>





