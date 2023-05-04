<?php

namespace App\Service\Calendar;

use App\DataTransferObjects\FilterDTO;

/**
 * Class Calendar
 * @package App\Service\Calendar
 */
class Calendar
{
    /**
     * @var array
     */
    protected array $dataProviders = [];

    /**
     * @param ProviderInterface $provider
     * @return void
     */
    public function addDataProvider(ProviderInterface $provider): void
    {
        $this->dataProviders[$provider->getType()] = $provider;
    }

    /**
     * @param FilterDTO $filterDTO
     * @return array
     */
    public function getEvents(FilterDTO $filterDTO): array
    {
        $data = [];

        foreach ($this->dataProviders as $provider) {
            $data = array_merge($data, $provider->getEvents($filterDTO));
        }

        return $data;
    }
}
