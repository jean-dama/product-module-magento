var config = {
    map: {
        '*': {
            'Custom_Product/js/real_product_qty': 'Custom_Product/js/real_product_qty'
        }
    },
    shim: {
        'Custom_Product/js/real_product_qty': {
            deps: ['jquery', 'mage/url']
        }
    }
};
