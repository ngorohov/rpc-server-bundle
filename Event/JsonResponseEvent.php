<?php

namespace Timiki\Bundle\RpcServerBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Timiki\Bundle\RpcServerBundle\JsonResponse;

/**
 * JsonResponse event
 */
class JsonResponseEvent extends Event
{
    const EVENT = 'json.response';

    /**
     * @var JsonResponse
     */
    private $jsonResponse;

    /**
     * JsonResponseEvent constructor.
     *
     * @param JsonResponse $jsonResponse
     */
    public function __construct(JsonResponse $jsonResponse)
    {
        $this->jsonResponse = $jsonResponse;
    }

    /**
     * Get json response.
     *
     * @return JsonResponse
     */
    public function getJsonResponse()
    {
        return $this->jsonResponse;
    }
}