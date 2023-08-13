<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\Document;

use BladL\NovaPoshta\DataContainers\Document\TrackingInformation;
use BladL\NovaPoshta\Results\Result;

final readonly class TrackingResult extends Result
{
    /**
     * @return list<TrackingInformation>
     */
    public function getDocumentsTracking(): array
    {
        return array_map(static fn (array $doc) => new TrackingInformation($doc), $this->container->getObjectList());
    }
}
