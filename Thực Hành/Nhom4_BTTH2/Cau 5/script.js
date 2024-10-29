$(document).ready(function () {
    function updateSubtotal(row) {
        const quantity = parseInt(row.find('.quantity').val());
        const price = parseInt(row.find('.price').val());
        const subtotal = quantity * price;
        row.find('.subtotal').text(subtotal.toLocaleString());
        updateTotal();
    }

    function updateTotal() {
        let total = 0;
        $('.subtotal').each(function () {
            total += parseInt($(this).text().replace(/,/g, ''));
        });
        $('#total').text(total.toLocaleString());
    }

    $('.quantity, .price').on('input', function () {
        const row = $(this).closest('tr');
        updateSubtotal(row);
    });

    $('.deleteBtn').click(function () {
        $(this).closest('tr').remove();
        updateTotal();
    });

    updateTotal();
});
