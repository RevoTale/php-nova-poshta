<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\Document;

use Grisaia\NovaPoshta\DataAdapters\Entities\Document\TrackingItem;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

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
