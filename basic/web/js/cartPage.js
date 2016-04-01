var CartView = Backbone.View.extend({

    el:'body',

    events: {
        "click .item-remove-from-cart-btn": "removeItem"
    },

    initialize: function() {
        _.bindAll(this, 'removeItem');
    },

    removeItem: function(event) {
        var itemId = $(event.target).attr('data-id'),
            self = this;
        global.cart.removeItem(itemId, function(result) {
            $('.cart-row[data-key=' + itemId + ']').detach();
            self.render(result.content);
        });
        return false;
    },

    render: function(data) {
        this.renderFooter(data)
    },

    renderFooter: function(data) {
        var $footer = $('footer.cart-footer', this.el);
        if (data.itemCount > 0) {
            $footer.html(this.footerTemplate(data));
        } else {
            $footer.html(this.emptyTempate());
        }

    },

    footerTemplate:_.template(
        '<div class="cart-subtotal">' +
        '<label> <%= itemCount %> </label> шт.' +
        '<label> <%= totalPrice %> </label> грн.' +
        '</div>' +

        '<a class="btn btn-success" href="#">Сформувати замовлення</a>'
    ),

    emptyTempate: _.template(
        '<div class="empty">No results found.</div>'
    )
});

var cart_view = new CartView();