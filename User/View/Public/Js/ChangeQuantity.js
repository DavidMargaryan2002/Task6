function minCart(tag) {
    let product_id = $(tag).parent().attr("id");
    let quantity = $(tag).siblings(".quantity").val();
    let hidden_quantity = $(tag).siblings(".hidden_quantity").val();
    let price = $(tag).siblings(".hidden_price").val();
    if (parseInt(quantity) > 1) {
        quantity--;
        let x = price * quantity;
        $(tag).siblings(".quantity").val(quantity);
    }
    $.ajax({
        url: "Controller/QuantityController.php",
        method: "post",
        data: {
            action: "min",
            product_id,
            quantity,
            hidden_quantity,
            price

        }
    })
}

function plusCart(tag) {
    let product_id = $(tag).parent().attr("id");
    let quantity = $(tag).siblings(".quantity").val();
    let price = $(tag).siblings(".hidden_price").val();
    let hidden_quantity = $(tag).siblings(".hidden_quantity").val();
    if (parseInt(quantity) < parseInt(hidden_quantity)) {
        quantity++;
        $(tag).siblings(".quantity").val(quantity);
    }
    $.ajax({
        url: "Controller/QuantityController.php",
        method: "post",
        data: {
            action: "plus",
            product_id,
            quantity,
            hidden_quantity,
            price
        }
    })
}