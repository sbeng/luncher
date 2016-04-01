$( document ).ready(function() {

    $('.item-add-to-cart-btn').click(function() {
        global.cart.addItem($(this).attr('data-id'));
        return false;
    });

    $('.item-remove-from-cart-btn').click(function() {
        global.cart.removeItem($(this).attr('data-id'));
        return false;
    });

});