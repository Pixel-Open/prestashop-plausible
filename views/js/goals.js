/* Works with default theme. Override in your own theme to adapt and extend. */
const plausibleGoals = {
    /* Default goal, send event with optional params */
    run: function(event, params) {
        plausible(event, params);
    },

    /* Checkout goal, allows to send the current step */
    checkout: function(event, params) {
        current();

        const continueButtons = document.getElementsByClassName('continue');
        for (let i = 0; i < continueButtons.length; i++) {
            continueButtons[i].addEventListener('click', function () {
                current();
            });
        }

        function current() {
            const steps = document.getElementsByClassName('checkout-step');
            for (let i = 0; i < steps.length; i++) {
                if (steps[i].classList.contains('-current')) {
                    plausible(event + '-' + (i + 1), params);
                }
            }
        }
    },
}
