function ShoppingCart () {

    this.getCart = function(success, failure)
    {
        $.ajax({
            url: "/cart/ajax-get-cart",
            dataType: 'json',
            success: function(result){
                if (!!success) {
                    success(result);
                }
            },
            error: function() {
                if (!!failure) {
                    failure();
                }
            }
        });
    };

    this.addItemToCart = function(itemId, success, failure)
    {
        $.ajax({
            url: "/cart/ajax-add-item?id=" + itemId,
            dataType: 'json',
            success: function(result){
                if (!!success) {
                    success(result);
                }
            },
            error: function() {
                if (!!failure) {
                    failure();
                }
            }
        });
    };

    this.removeItemFromCart = function(itemId, success, failure)
    {
        $.ajax({
            url: "/cart/ajax-remove-item?id=" + itemId,
            dataType: 'json',
            success: function(result){
                if (!!success) {
                    success(result);
                }
            },
            error: function() {
                if (!!failure) {
                    failure();
                }
            }
        });
    };
}