<?php

namespace MRP\StripeWebhookBundle\Controller;

use MRP\StripeWebhookBundle\Event\StripeWebhookEvent;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends ContainerAware
{
	public function indexAction(Request $request)
	{
		$content = json_decode($request->getContent(), true);

		$event = is_array($content) && isset($content['type']) ? $content['type'] : 'unknown';

		$this->container->get('event_dispatcher')->dispatch(
			'mrp_stripe_webhook.generic',
			new StripeWebhookEvent($event, $content)
		);

		$this->container->get('event_dispatcher')->dispatch(
			'mrp_stripe_webhook.'. $event,
			new StripeWebhookEvent($event, $content)
		);

		return new Response('ok', 200);
	}
}