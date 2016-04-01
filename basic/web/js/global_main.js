var global = {

    cart: {
        update: function() {
            var self = this,
                cart = new ShoppingCart();

            cart.getCart(function(result) {
                if (!result.error) {
                    self.refreshCart(result);
                }
            });
        },

        addItem: function(itemId, success) {
            var self = this,
                cart = new ShoppingCart();

            cart.addItemToCart(itemId, function(result) {
                if (!result.error) {
                    self.refreshCart(result);
                    if (success) {
                        success(result);
                    }
                }
            });
        },

        removeItem: function(itemId, success) {
            var self = this,
                cart = new ShoppingCart();

            cart.removeItemFromCart(itemId, function(result) {
                if (!result.error) {
                    self.refreshCart(result);
                    if (success) {
                        success(result);
                    }
                }
            });
        },

        refreshCart: function(result) {
            var itemCount = result.content.itemCount,
                $cartEl = $('.navbar .navbar-cart-item');

            if (itemCount>0) {
                $cartEl.text('Cart ('+itemCount+')');
            } else {
                $cartEl.text('Cart');
            }
        }
    }

};

$( document ).ready(function() {
    global.cart.update();
});