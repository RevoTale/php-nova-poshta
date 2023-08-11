<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\Description;
use BladL\NovaPoshta\DataContainers\Traits\Ref;

final class SettlementAreaItem extends DataContainer
{
    use Ref;
    use Description;
    public function getAreasCenterRef():string {
        return $this->data->string('AreasCenter');
    }

    public function getRegionType():string {
        return $this->data->string('RegionType');
    }
}
