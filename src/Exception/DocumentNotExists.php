<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Exception;

use Grisaia\NovaPoshta\DataAdapters\Entities\Document\TrackingItem;
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
        parent::__construct('ТТН не существует ' . $status);
    }
}
