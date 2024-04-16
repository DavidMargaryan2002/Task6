function DeleteCart(tag) {
    let product_id = $(tag).parent().parent('.bigTr').attr("id");
    $.ajax({
        url: "Controller/AddToCartController.php",
        type: "post",
        dataType: "json",
        data: {'id': product_id, 'action': "delete"},
    })
    $(tag).parent().parent('.bigTr').remove();
}