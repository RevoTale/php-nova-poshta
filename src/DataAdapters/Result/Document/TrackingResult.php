<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Document;

use BladL\NovaPoshta\Decorators\Objects\Document\TrackingInformation;
use BladL\NovaPoshta\DataAdapters\Result;

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
