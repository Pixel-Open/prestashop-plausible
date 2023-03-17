# Prestashop Plausible

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.2-green)](https://php.net/)
[![Minimum Prestashop Version](https://img.shields.io/badge/prestashop-%3E%3D%201.7.6.0-green)](https://www.prestashop.com)
[![GitHub release](https://img.shields.io/github/v/release/Pixel-Open/prestashop-plausible)](https://github.com/Pixel-Open/prestashop-plausible/releases)

## Presentation

Add Plausible Analytics in Prestashop.

![Screenshot](screenshot.png)

## Requirements

- Prestashop >= 1.7.6.0
- PHP >= 7.2.0

## Installation

Download the **pixel_plausible.zip** file from the [last release](https://github.com/Pixel-Open/prestashop-plausible/releases/latest) assets.

### Admin

Go to the admin module catalog section and click **Upload a module**. Select the downloaded zip file.

### Manually

Move the downloaded file in the Prestashop **modules** directory and unzip the archive. Go to the admin module catalog section and search for "Plausible".

## Configuration

From the module manager, find the module and click on configure.

| Field                  | Description                                                                                           | Example                                                  | Required |
|:-----------------------|:------------------------------------------------------------------------------------------------------|----------------------------------------------------------|----------|
| Add JavaScript snippet | Enable stats by including the Plausible snippet in the head of your website                           | Yes                                                      | Y        |
| Plausible Instance URL | Your plausible instance URL. Allow to use a custom domain for dedicated instance                      | https://plausible.io                                     | N        |
| Shared Link            | The shared link allows to display stats in the "Statistics > Plausible" menu                          | https://plausible.io/share/website.prestashop?auth=xxxxx | N        |
| Enable goals           | Enable goal events: contact, cart, checkout-step-X, order                                             | Yes                                                      | Y        |
| Contact goal name      | Plausible goal name when customer send a contact message. Leave empty to ignore.                      | contact                                                  | N        |
| Cart goal name         | Plausible goal name when customer goes to the cart. Leave empty to ignore.                            | cart                                                     | N        |
| Checkout goal name     | Plausible goal name prefix when customer goes to a checkout step {goalName}-X. Leave empty to ignore. | checkout-step                                            | N        |
| Order goal name        | Plausible goal name when customer submits order. Leave empty to ignore                                | order                                                    | N        |

Create the **shared link** in your Plausible settings for the site in *Visibility > Shared links > + New link*

## Stats

In the Prestashop admin, the Plausible stats are available in the *Statistics > Plausible* menu.

## Goals

The module includes goal events when enabled in module configuration.

- Contact message sent
- Account registration
- Cart view
- Checkout step X
- Order complete

You need to add goal events in your Plausible website configuration:

![Plausible Goals](goals.png)

The Plausible goal name must be the same as the name in the Prestashop module configuration.

Default goal names are:

- contact
- register
- cart
- checkout-step-1
- checkout-step-2
- checkout-step-3
- checkout-step-4
- order

### How to add a custom goal?

In any template or JS file, use the `plausible` method to send the event to Plausible. Example:

```html
<input type="button" value="My Button" id="my-form-button" />

<script type="text/javascript">
    const myButton = document.getElementById('my-form-button');
    if (myButton) {
        myButton.addEventListener('click', function() {
            plausible('my-form-button'); // "my-form-button" is the Plausible goal event name
        });
    }
</script>
```