<table class="table table-striped ">
    <?php foreach ($product as  $val => $key ):?>
        <tr class="bigTr" id="<?= $key[0]['id'] ?>">
            <td><img class="img" src="View/Public/Images/<?= $key[0]['image_path'] ?>" alt="Card image cap"></td>
            <td><h5 class="card-title"><?= $key[0]['name'] ?></h5></td>
            <td class="td"><h5 class="card-title"><?= $key[0]['price'] ?> AMD</h5></td>
            <td><p class="card-text"><?= mb_substr($key[0]['description'], 0, 40) ?></p></td>
            <td class="bigTd" id="<?= $key[0]['id'] ?>">
                <button type="button" class="btn btn-outline-info btnmin" onclick="plusCart(this)">+</button>
                <input type="number" class="quantity" value="<?= $_SESSION['cart_array'][$val] ?>">
                <input class="hidden_price" type="hidden" value="<?= $key[0]["price"] ?>">
                <input class="hidden_quantity" type="hidden" value="<?= $key[0]["quantity"] ?>">
                <input class="total_quantity" type="hidden" value="<?= $total_quantity ?>">
                <button type="button" class="btn btn-outline-info btnmin" onclick="minCart(this)">-</button>
            </td>
            <td>
                <button type="button" class="btn btn-outline-info " onclick="DeleteCart(this)">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
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