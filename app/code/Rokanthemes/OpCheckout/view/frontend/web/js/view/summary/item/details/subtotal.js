define(
    [
        'Magento_Checkout/js/view/summary/abstract-total'
    ],
    function (viewModel) {
        "use strict";
        return viewModel.extend({
            defaults: {
                displayArea: 'after_details',
                template: 'Magento_Checkout/summary/item/details/subtotal'
            },
            getValue: function(quoteItem) {
                return this.getFormattedPrice(quoteItem.row_total);
            }
        });
    }
);
