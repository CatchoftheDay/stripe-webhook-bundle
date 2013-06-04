<?php

namespace MRP\StripeWebhookBundle\EventListener;

use MRP\StripeWebhookBundle\Event\StripeWebhookEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

class StripeWebhookListener implements EventSubscriberInterface
{
	/** @var \Symfony\Component\HttpKernel\Log\LoggerInterface  */
	protected $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	public static function getSubscribedEvents()
	{
		return array(
			'mrp_stripe_webhook.generic' => 'onGenericWebhookEvent'
		);
	}

	public function onGenericWebhookEvent(StripeWebhookEvent $event)
	{
		$response = $event->getResponse();
		$this->logger->info("Stripe webhook received. ID: {$response['id']}, Type: {$response['type']}");
	}
}