<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Document;

use BladL\NovaPoshta\DataAdapters\Entities\Document\TrackingInformation;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class TrackingResult extends Result
{
    /**
     * @return list<TrackingInformation>
     */
    public function getDocumentsTracking(): array
    {
        return array_map(static fn (ObjectNormalizer $doc) => new TrackingInformation($doc), $this->container->getDataAsObjectList());
    }
}
