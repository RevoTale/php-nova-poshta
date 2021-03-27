<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Exceptions;

use Awanturist\NovaPoshtaAPI\DataContainers\Document\TrackingInformation;
use Exception;

final class DocumentNotExists extends Exception
{
    private TrackingInformation $tracking;

    public function getTracking(): TrackingInformation
    {
        return $this->tracking;
    }

    public function __construct(TrackingInformation $tracking)
    {
        $this->tracking = $tracking;
        $status = $tracking->getStatusDescription();
        parent::__construct("ТТН не сущеуствует $status");
    }
}
