<?php

namespace LaravelAzMonitor;

use DateTimeImmutable;
use Illuminate\Support\Str;
use LaravelAzMonitor\Channels\DataPoint;
use LaravelAzMonitor\Channels\Dependency;
use LaravelAzMonitor\Channels\Event;
use LaravelAzMonitor\Channels\Exception;
use LaravelAzMonitor\Channels\ExceptionDetail;
use LaravelAzMonitor\Channels\Message;
use LaravelAzMonitor\Channels\MetricData;
use LaravelAzMonitor\Channels\PageView;
use LaravelAzMonitor\Channels\Request;
use LaravelAzMonitor\Channels\StackFrame;
use LaravelAzMonitor\Contracts\DataPointType;
use LaravelAzMonitor\Contracts\SeverityLevel;
use Throwable;

/**
 * @see https://docs.microsoft.com/en-us/azure/azure-monitor/app/api-custom-events-metrics
 */
class TelemetryClient {

    protected TelemetryContext $context;
    protected TelemetryChannel $channel;

    public function __construct(TelemetryContext $context = null, TelemetryChannel $channel = null) {
        $this->context = $context ?? new TelemetryContext();
        $this->channel = $channel ?? new TelemetryChannel();
    }

    /**
     * Sends a Page View event to the Application Insights service
     */
    public function trackPageView(string $name, string $url, float $duration, array $properties = null, array $measurements = null): void {
        $this->channel->addToQueue((new PageView())
            ->name($name)
            ->url($url)
            ->duration($duration)
            ->properties($properties)
            ->measurements($measurements), $this->context);
    }

    /**
     * Sends a Metric to the Application Insights service
     */
    public function trackMetric(string $name, float $value, DataPointType $type = null, int $count = null, float $min = null, float $max = null, float $stdDev = null, array $properties = null): void {
        $this->channel->addToQueue((new MetricData())->metrics([
            (new DataPoint())
                ->name($name)
                ->value($value)
                ->type($type)
                ->count($count)
                ->min($min)
                ->max($max)
                ->standardDeviation($stdDev),
        ])->properties($properties), $this->context);
    }

    /**
     * Sends an Event to the Application Insights service
     */
    public function trackEvent(string $name, array $properties = null, array $measurements = null): void {
        $this->channel->addToQueue((new Event())
            ->name($name)
            ->properties($properties)
            ->measurements($measurements), $this->context);
    }

    /**
     * Sends a Trace to the Application Insights service
     */
    public function trackTrace(string $message, SeverityLevel $severity, array $properties = null): void {
        $this->channel->addToQueue((new Message())
            ->message($message)
            ->severity($severity)
            ->properties($properties), $this->context);
    }

    /**
     * Sends a Dependency to the Application Insights service
     */
    public function trackDependency(string $name, string $type = "", string $command = null, DateTimeImmutable $start = null, float $duration = null, bool $success = null, int $result = null, array $properties = null): void {
        $this->channel->addToQueue((new Dependency())
            ->name($name)
            ->type($type)
            ->command($command)
            ->startTime($start)
            ->duration($duration)
            ->successful($success)
            ->resultCode($result)
            ->properties($properties), $this->context);
    }

    /**
     * Sends a Request to the Application Insights service
     */
    public function trackRequest(string $name, string $url, DateTimeImmutable $start, float $duration = 0, int $result = 200, bool $success = true, array $properties = null, array $measurements = null): void {
        $this->endRequest(
            $this->beginRequest($name, $url, $start),
            $duration, $result, $success, $properties, $measurements
        );
    }

    /**
     * Sends an Exception to the Application Insights service
     */
    public function trackException(Throwable $exception, array $properties = null, array $measurements = null): void {
        $details = (new ExceptionDetail())
            ->id(1)
            ->outerId(0)
            ->typeName(get_class($exception))
            ->message($exception->getMessage())
            ->hasFullStack(true);

        $frameCounter = 0;
        $stackFrames = [];
        foreach ($exception->getTrace() as $currentFrame) {
            $stackFrame = (new StackFrame())->level($frameCounter);
            if (array_key_exists('class', $currentFrame)) $stackFrame->assembly($currentFrame['class']);
            if (array_key_exists('file', $currentFrame)) $stackFrame->file($currentFrame['file']);
            if (array_key_exists('line', $currentFrame)) $stackFrame->line($currentFrame['line']);
            if (array_key_exists('function', $currentFrame)) $stackFrame->method($currentFrame['function']);

            array_unshift($stackFrames, $stackFrame);
            $frameCounter++;
        }

        $details->stack($stackFrames);
        $this->channel->addToQueue((new Exception())
            ->exceptions([$details])
            ->properties($properties)
            ->measurements($measurements), $this->context);
    }

    /**
     * Begin a Request; this request is not sent until an endRequest call is made, passing this request
     * @see endRequest
     */
    public function beginRequest(string $name, string $url, DateTimeImmutable $start): Request {
        return (new Request())
            ->id(Str::orderedUuid())
            ->name($name)
            ->url($url)
            ->startTime($start);
    }

    /**
     * Sends a Request created by beginRequest to the Application Insights service
     * @see beginRequest
     */
    public function endRequest(Request $request, float $duration = 0, int $result = 200, bool $success = true, array $properties = null, array $measurements = null): void {
        $this->channel->addToQueue($request
            ->duration($duration)
            ->resultCode($result)
            ->successful($success)
            ->properties($properties)
            ->measurements($measurements), $this->context);
    }


}
