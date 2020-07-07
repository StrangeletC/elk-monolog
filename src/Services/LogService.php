<?php

namespace App\Services;

use Exception;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Class LogService
 * @package App\Services
 */
class LogService
{
    private const CUSTOM_LOG_LEVEL = 600;
    private const CUSTOM_LOG_LEVEL_NAME = 'custom_log_level';

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function createLogByLevelInBatch(int $batchSize, string $logLevel): void
    {
        for ($iterator = 1; $iterator <= $batchSize; $iterator++) {
            $this->createLogByLevel($logLevel);
        }
    }

    public function createRandomLogInBatch(int $batchSize): void
    {
        $logLevels = $this->getLogLevels();

        for ($iterator = 1; $iterator <= $batchSize; $iterator++) {
            $randomIndex = random_int(0, count($logLevels));

            $this->createLogByLevel($logLevels[$randomIndex]);
        }
    }

    public function createLogByLevel(string $logLevel): void
    {
        switch ($logLevel) {
            case LogLevel::EMERGENCY:
                $this->logger->emergency('EMERGENCY MESSAGE ' . time());
                break;
            case LogLevel::ALERT:
                $this->logger->alert('ALERT MESSAGE ' . time());
                break;
            case LogLevel::CRITICAL:
                $this->logger->critical('CRITICAL MESSAGE ' . time());
                break;
            case LogLevel::ERROR:
                $this->logger->error('ERROR MESSAGE ' . time());
                break;
            case LogLevel::WARNING:
                $this->logger->warning('WARNING MESSAGE ' . time());
                break;
            case LogLevel::NOTICE:
                $this->logger->notice('NOTICE MESSAGE ' . time());
                break;
            case LogLevel::INFO:
                $this->logger->info('INFO MESSAGE ' . time());
                break;
            case LogLevel::DEBUG:
                $this->logger->debug('DEBUG MESSAGE ' . time());
                break;
            default:
                try {
                    throw new Exception('No log level');
                } catch (Exception $exception) {
                    $this->logger->log(self::CUSTOM_LOG_LEVEL, $exception->getMessage());
                }
        }
    }

    private function getLogLevels(): array
    {
        return [
            LogLevel::EMERGENCY,
            LogLevel::ALERT,
            LogLevel::CRITICAL,
            LogLevel::ERROR,
            LogLevel::WARNING,
            LogLevel::NOTICE,
            LogLevel::INFO,
            LogLevel::DEBUG,
            self::CUSTOM_LOG_LEVEL_NAME,
        ];
    }
}