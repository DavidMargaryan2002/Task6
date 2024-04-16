function addToCart(tag) {
    let product_id = $(tag).parent().attr("id");
    let product_price = $(tag).siblings('.price').attr("id");
    $.ajax({
        url: "Controller/AddToCartController.php",
        type: "post",
        dataType: "json",
        data: {'id': product_id, 'price': product_price, 'action': "add"},
    })
}

