<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Document;

use BladL\NovaPoshta\DataAdapters\Entities\Document\TrackingItem;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class TrackingResult extends Result
{
    /**
     * @return list<TrackingItem>
     */
    public function getDocumentsTracking(): array
    {
        return array_map(static fn (ObjectNormalizer $doc) => new TrackingItem($doc), $this->container->getDataAsObjectList());
    }
}
