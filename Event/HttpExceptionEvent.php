<?php

namespace Timiki\Bundle\RpcServerBundle\Event;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * HttpException event
 */
class HttpExceptionEvent extends HttpResponseEvent
{
    const EVENT = 'http.exception';

    /**
     * @var \Exception
     */
    private $exception;

    /**
     * HttpExceptionEvent constructor.
     *
     * @param HttpResponse $httpResponse
     * @param \Exception $exception
     */
    public function __construct(HttpResponse $httpResponse, \Exception $exception)
    {
        parent::__construct($httpResponse);

        $this->exception = $httpResponse;
    }

    /**
     * Get exception.
     *
     * @return \Exception
     */
    public function getException()
    {
        return $this->exception;
    }
}