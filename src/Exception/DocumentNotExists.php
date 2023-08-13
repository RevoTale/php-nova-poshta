<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exception;

use BladL\NovaPoshta\Decorators\Objects\Document\TrackingInformation;
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
        parent::__construct("ТТН не существует $status");
    }
}
