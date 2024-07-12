document.addEventListener("DOMContentLoaded", function () {
    const taxRate = 0.1; // Example tax rate of 10%
    const cartRows = document.querySelectorAll('.cart-row');
    const subTotalElement = document.getElementById('sub-total');
    const taxAmountElement = document.getElementById('tax-amount');
    const totalPriceElement = document.getElementById('total-price');

    function updateTotals() {
        let subTotal = 0;
        cartRows.forEach(row => {
            const priceElement = row.querySelector('.game-price');
            const quantityElement = row.querySelector('.game-number');
            const price = parseFloat(priceElement.textContent) || 0;
            const quantity = parseInt(quantityElement.value) || 0;
            subTotal += price * quantity;
        });

        const taxAmount = subTotal * taxRate;
        const totalPrice = subTotal + taxAmount;

        subTotalElement.textContent = "€" + subTotal.toFixed(2);
        taxAmountElement.textContent = "€" + taxAmount.toFixed(2);
        totalPriceElement.textContent = "€" + totalPrice.toFixed(2);

        console.log(`SubTotal: ${subTotal}, Tax: ${taxAmount}, Total: ${totalPrice}`); // Log di debug
    }

    cartRows.forEach(row => {
        const minusButton = row.querySelector('.game-minus');
        const plusButton = row.querySelector('.game-plus');
        const quantityElement = row.querySelector('.game-number');

        minusButton.addEventListener('click', () => {
            if (quantityElement.value > 0) {
                quantityElement.value--;
                updateTotals();
            }
        });

        plusButton.addEventListener('click', () => {
            quantityElement.value++;
            updateTotals();
        });

        quantityElement.addEventListener('change', () => {
            if (quantityElement.value < 0) {
                quantityElement.value = 0;
            }
            updateTotals();
        });
    });

    updateTotals(); // Initial calculation
});
