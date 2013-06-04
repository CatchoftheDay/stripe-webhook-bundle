# MRPStripeWebhookBundle #

A Symfony 2 bundle for handling Stripe Webhooks.

Features:
- Triggers a Symfony event from a Stripe Webhook event.

## Status ##
WIP

## Installation ##
### Step 1: ###
Add MRPStripeWebhookBundle to your composer.json:

```js
{
	"require": {
		"mrp/stripe-webhook-bundle": "*"
	}
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update mrp/stripe-webhook-bundle
```

### Step 2: ###
Enable this bundle in your kernel:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
	$bundles = array(
		// …
		new MRR\StripeWebhookBundle\MRPStripeWebhookBundle()
	);
}
```

### Step 3: ###
Import the MRPStripeWebhookBundle routing files:

In YAML:
```yaml
# app/config/routing.yml
mrp_stripe_webhook:
	resources: "@MRPStripeWebhookBundle/Resources/config/routing/routing.yml"
	prefix: /stripe-webhooks
```

### Webhooks ###
This bundle receives webhooks at "/stripe-webhooks" and dispatches the event which you can listen for.

For example: the 'charge.succeeded' event is dispatched as 'mrp_stripe_webhook.charge.succeeded'