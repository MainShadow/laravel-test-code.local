<?php

namespace App\Service\Calendar;

use App\DataTransferObjects\FilterDTO;

interface ProviderInterface
{
    public function getEvents(FilterDTO $filterDTO): ?array;

    public function getType(): int;

    public function getTypeName(): string;
}
