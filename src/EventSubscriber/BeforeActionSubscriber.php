<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class BeforeActionSubscriber
 * @package App\EventSubscriber
 */
class BeforeActionSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return array(
            KernelEvents::REQUEST => 'convertJsonStringToArray',
        );
    }

    /**
     * Converts JSON payload to array
     *
     * @param RequestEvent $event
     */
    public function convertJsonStringToArray(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if ($request->getContentType() != 'json' || !$request->getContent()) {
            return;
        }

        $data = json_decode($request->getContent(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new BadRequestHttpException('invalid json body: ' . json_last_error_msg());
        }

        $request->request->replace(is_array($data) ? $data : array());
    }
}
