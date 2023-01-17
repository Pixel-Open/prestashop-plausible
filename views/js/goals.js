/* Works with default theme. Override in your own theme to adapt and extend. */
const plausibleGoals = {
    /* Goal: "contact" */
    contact: function() {
        const contactButton = document.querySelector('input[name="submitMessage"]');
        if (contactButton) {
            contactButton.addEventListener('click', function () {
                plausible('contact');
            });
        }
    },

    /* Goal: "cart" */
    cart: function() {
        const cart = document.getElementById('cart');
        if (cart) {
            plausible('cart');
        }
    },

    /* Goal: "checkout-step-X" */
    checkout: function() {
        const checkout = document.getElementById('checkout');
        if (checkout) {
            current();

            const continueButtons = document.getElementsByClassName('continue');
            for (let i = 0; i <= continueButtons.length; i++) {
                continueButtons[i].addEventListener('click', function () {
                    current();
                });
            }
        }

        function current() {
            const steps = document.getElementsByClassName('checkout-step');
            for (let i = 0; i <= steps.length; i++) {
                if (steps[i].classList.contains('-current')) {
                    plausible('checkout-step-' + (i + 1));
                }
            }
        }
    },

    /* Goal: "order" */
    order: function() {
        const order = document.getElementById('order-confirmation');
        if (order) {
            plausible('order');
        }
    }
}
