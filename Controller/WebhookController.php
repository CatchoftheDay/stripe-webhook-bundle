<?php

namespace MRP\StripeWebhookBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends ContainerAware
{
	public function indexAction(Request $request)
	{
		$content = json_decode($request->getContent(), true);

		$event = $content['type'];
		$data = $content['data'];

		return new Response('ok', 200);
	}
}