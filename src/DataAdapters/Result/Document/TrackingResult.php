<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Document;

use BladL\NovaPoshta\DataAdapters\Entities\Document\TrackingInformation;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Decorator\ObjectDecorator;

final readonly class TrackingResult extends Result
{
    /**
     * @return list<TrackingInformation>
     */
    public function getDocumentsTracking(): array
    {
        return array_map(static fn (ObjectDecorator $doc) => new TrackingInformation($doc), $this->container->getDataAsObjectList());
    }
}
