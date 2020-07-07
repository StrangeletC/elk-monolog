<?php

namespace App\Controller;

use App\Services\LogService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LogController
 * @package App\Controller
 */
class LogController extends AbstractController
{
    private LogService $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function createOneLog(Request $request): Response
    {
        $logLevel = $request->request->get('logLevel');

        $this->logService->createLogByLevel($logLevel);

        return $this->redirect('/');
    }

    public function createManyLogs(Request $request): Response
    {
        $logLevel = $request->request->get('logLevel');
        $batchSize = $request->request->get('batchSize');

        $this->logService->createLogByLevelInBatch($batchSize, $logLevel);

        return $this->redirect('/');
    }

    public function createManyRandomLogs(Request $request): Response
    {
        $batchSize = $request->request->get('batchSize');

        $this->logService->createRandomLogInBatch($batchSize);

        return $this->redirect('/');
    }
}