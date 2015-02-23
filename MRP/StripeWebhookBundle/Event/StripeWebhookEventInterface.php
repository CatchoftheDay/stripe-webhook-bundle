<?php

namespace MRP\StripeWebhookBundle\Event;

interface StripeWebhookEventInterface
{
	public function getEventName();
	public function getResponse();
}