<?php
declare(strict_types=1);


namespace Awanturist\NovaPoshtaAPI\Results\Document;


use Awanturist\NovaPoshtaAPI\DataContainers\Document\TrackingInformation;
use Awanturist\NovaPoshtaAPI\Results\Result;

final class TrackingResult extends Result
{
    /**
     * @return TrackingInformation[]
     */
    public function getDocumentsTracking(): array
    {
        return array_map(static fn (array $doc) => new TrackingInformation($doc), $this->container->getData());
    }
}
