<?php

namespace Problematic\IPHunterBundle\EventListener;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Problematic\IPHunterBundle\Model\HunterLogManagerInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class RequestListener
{

    protected $securityContext;
    protected $logManager;

    public function __construct(SecurityContextInterface $securityContext, HunterLogManagerInterface $logManager)
    {
        $this->securityContext = $securityContext;
        $this->logManager = $logManager;
    }

    public function onKernelRequest(FilterResponseEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }

        $request = $event->getRequest();
        $response = $event->getResponse();

        $log = $this->logManager->createLog();

        $log->setIp($request->server->get('REMOTE_ADDR'));
        $log->setUri($request->getRequestUri());
        $log->setMethod($request->getMethod());

        $token = $this->securityContext->getToken();
        if (null !== $token && $this->securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $log->setUsername($token->getUsername());
        }

        if ($response->headers->has('x-debug-token')) {
            $log->setToken($response->headers->get('x-debug-token'));
        }

        $this->logManager->addLog($log);
    }

}
