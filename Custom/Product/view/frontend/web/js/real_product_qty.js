require(['jquery', 'mage/url'], 
function ($, urlBuilder) {
    setInterval(function () {
        $.ajax({
            url: urlBuilder.build('customproduct/stock'),
            type: 'GET',
            success: function (response) {
                $('#real-product-quantity').text(response.stock);
            }
        });
    }, 2000);
});
