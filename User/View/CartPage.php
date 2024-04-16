<table class="table table-striped ">
    <?php foreach ($_SESSION['cart_array'] as $id => $quantity):
        foreach ($_SESSION['cart'][$id] as $key):?>
            <tr class="bigTr" id="<?= $key['id'] ?>">
                <td><img class="img" src="View/Public/Images/<?= $key['image_path'] ?>" alt="Card image cap"></td>
                <td><h5 class="card-title"><?= $key['name'] ?></h5></td>
                <td class="td"><h5 class="card-title"><?= $key['price'] ?> AMD</h5></td>
                <td><p class="card-text"><?= mb_substr($key ['description'], 0, 40) ?></p></td>
                <td class="bigTd" id="<?= $key['id'] ?>">
                    <button type="button" class="btn btn-outline-info btnmin" onclick="plusCart(this)">+</button>
                    <input type="number" class="quantity" value="<?= $quantity ?>">
                    <input class="hidden_price" type="hidden" value="<?= $key["price"] ?>">
                    <input class="hidden_quantity" type="hidden" value="<?= $key["quantity"] ?>">
                    <input class="total_quantity" type="hidden" value="<?= $total_quantity ?>">
                    <button type="button" class="btn btn-outline-info btnmin" onclick="minCart(this)">-</button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-info " onclick="DeleteCart(this)">Delete</button>
                </td>
            </tr>
        <?php endforeach;
    endforeach; ?>
</table>
<section class="section_order">
    <div class="order_div">
        <p>Total number of products</p>
        <h3 class="order_h3"><?= $total_quantity ?></h3>
        <h4>Total price of products</h4>
        <h1 class="order_h1"><?= $price ?> դրամ</h1>
        <a class="btn btn-primary" href="index.php?action=OrderPage">Order By</a>
    </div>
</section>






