<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LogController
 * @package App\Controller
 */
class LogController extends AbstractController
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logInfo(): Response
    {
        $this->logger->info('INFO MESSAGE ' . time());

        return $this->redirect('/');
    }

    public function logError(): Response
    {
        $this->logger->error('ERROR MESSAGE ' . time());

        return $this->redirect('/');
    }

    public function logAlert(): Response
    {
        $this->logger->alert('ALERT MESSAGE ' . time());

        return $this->redirect('/');
    }

    public function logCritical(): Response
    {
        $this->logger->critical('CRITICAL MESSAGE ' . time());

        return $this->redirect('/');
    }

    public function logEmergency(): Response
    {
        $this->logger->emergency('EMERGENCY MESSAGE ' . time());

        return $this->redirect('/');
    }

    public function logDebug(): Response
    {
        $this->logger->debug('DEBUG MESSAGE ' . time());

        return $this->redirect('/');
    }

    public function logWarning(): Response
    {
        $this->logger->warning('WARNING MESSAGE ' . time());

        return $this->redirect('/');
    }

    public function logNotice(): Response
    {
        $this->logger->notice('NOTICE MESSAGE ' . time());

        return $this->redirect('/');
    }

}