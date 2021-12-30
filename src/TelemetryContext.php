<?php

namespace LaravelAzMonitor;

use LaravelAzMonitor\Contexts\Application;
use LaravelAzMonitor\Contexts\Cloud;
use LaravelAzMonitor\Contexts\Device;
use LaravelAzMonitor\Contexts\Internal;
use LaravelAzMonitor\Contexts\Location;
use LaravelAzMonitor\Contexts\Operation;
use LaravelAzMonitor\Contexts\Session;
use LaravelAzMonitor\Contexts\User;

class TelemetryContext {

    protected string $instrumentationKey;
    protected Device $deviceContext;
    protected Cloud $cloudContext;
    protected Application $applicationContext;
    protected User $userContext;
    protected Location $locationContext;
    protected Operation $operationContext;
    protected Session $sessionContext;
    protected Internal $internalContext;
    protected array $properties;

    public function __construct(string $instrumentationKey = null) {
        if ($instrumentationKey) $this->setInstrumentationKey($instrumentationKey);

        $this->setDeviceContext(new Device());
        $this->setCloudContext(new Cloud());
        $this->setApplicationContext(new Application());
        $this->setUserContext(new User());
        $this->setLocationContext(new Location());
        $this->setOperationContext(new Operation());
        $this->setSessionContext(new Session());
        $this->setInternalContext(new Internal());
        $this->setProperties([]);
    }

    /**
     * Get the instrumentation key for your Application Insights application
     */
    public function getInstrumentationKey(): string {
        return $this->instrumentationKey;
    }

    /**
     * Sets the instrumentation key on the context;
     * this is the key for your application in Application Insights
     */
    public function setInstrumentationKey(string $key): void {
        $this->instrumentationKey = $key;
    }

    /**
     * Get the device context object
     */
    public function getDeviceContext(): Device {
        return $this->deviceContext;
    }

    /**
     * Sets device context object;
     * allows you to set properties that will be attached to all telemetry about the device
     */
    public function setDeviceContext(Device $device): void {
        $this->deviceContext = $device;
    }

    /**
     * Get the cloud context object
     */
    public function getCloudContext(): Cloud {
        return $this->cloudContext;
    }

    /**
     * Sets cloud context object;
     * allows you to set properties that will be attached to all telemetry about the cloud placement of an application
     */
    public function setCloudContext(Cloud $cloud): void {
        $this->cloudContext = $cloud;
    }

    /**
     * Get the application context object
     */
    public function getApplicationContext(): Application {
        return $this->applicationContext;
    }

    /**
     * Sets application context object;
     * allows you to set properties that will be attached to all telemetry about the application
     */
    public function setApplicationContext(Application $application): void {
        $this->applicationContext = $application;
    }

    /**
     * Get the user context object
     */
    public function getUserContext(): User {
        return $this->userContext;
    }

    /**
     * Sets user context object;
     * allows you to set properties that will be attached to all telemetry about the user
     */
    public function setUserContext(User $user): void {
        $this->userContext = $user;
    }

    /**
     * Get the location context object
     */
    public function getLocationContext(): Location {
        return $this->locationContext;
    }

    /**
     * Sets location context object;
     * allows you to set properties that will be attached to all telemetry about the location
     */
    public function setLocationContext(Location $location): void {
        $this->locationContext = $location;
    }

    /**
     * Get the operation context object
     */
    public function getOperationContext(): Operation {
        return $this->operationContext;
    }

    /**
     * Sets operation context object;
     * allows you to set properties that will be attached to all telemetry about the operation
     */
    public function setOperationContext(Operation $operation): void {
        $this->operationContext = $operation;
    }

    /**
     * Get the session context object
     */
    public function getSessionContext(): Session {
        return $this->sessionContext;
    }

    /**
     * Sets session context object;
     * allows you to set properties that will be attached to all telemetry about the session
     */
    public function setSessionContext(Session $session): void {
        $this->sessionContext = $session;
    }

    /**
     * Get the internal context object
     */
    public function getInternalContext(): Internal {
        return $this->internalContext;
    }

    /**
     * Sets internal context object;
     * allows you to set internal details for troubleshooting
     */
    public function setInternalContext(Internal $internal): void {
        $this->internalContext = $internal;
    }

    /**
     * Get the additional custom properties array
     */
    public function getProperties(): array {
        return $this->properties;
    }

    /**
     * Sets additional custom properties (name/value pairs) to append as custom properties to all telemetry
     */
    public function setProperties(array $properties): void {
        $this->properties = $properties;
    }


}
