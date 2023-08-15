<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exception;

use BladL\NovaPoshta\DataAdapters\Entities\Document\TrackingItem;
use Exception;

final class DocumentNotExists extends Exception
{
    private TrackingItem $tracking;

    public function getTracking(): TrackingItem
    {
        return $this->tracking;
    }

    public function __construct(TrackingItem $tracking)
    {
        $this->tracking = $tracking;
        $status = $tracking->getStatusDescription();
        parent::__construct("ТТН не существует $status");
    }
}
