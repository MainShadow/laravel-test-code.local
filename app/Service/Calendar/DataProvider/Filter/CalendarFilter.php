<?php

namespace App\Service\Calendar\DataProvider\Filter;

use App\DataTransferObjects\FilterDTO;
use App\Helpers\DateHelper;
use Illuminate\Database\Query\Builder;

class CalendarFilter
{
    /**
     * @var FilterDTO
     */
    protected FilterDTO $filterDTO;

    /**
     * @var Builder
     */
    protected Builder $builder;

    /**
     * @param Builder $builder
     * @param FilterDTO $filterDTO
     */
    public function __construct(Builder $builder, FilterDTO $filterDTO)
    {
        $this->filterDTO = $filterDTO;
        $this->builder = $builder;
    }

    /**
     * @return Builder
     */
    public function addFilters(): Builder
    {
        $this->addDateToFilter();
        $this->addDateFromFilter();
        $this->addLevelIdFilter();
        $this->addCourseIdFilter();
        $this->addFormatIdFilter();
        return $this->builder;
    }

    /**
     * @return void
     */
    protected function addDateFromFilter(): void
    {
        $this->filterDTO->getDateFrom() ?:
            $this->builder->where('date_start', '>=', $this->filterDTO->getDateFrom()
                ->format(DateHelper::DATE_FORMAT));
    }

    /**
     * @return void
     */
    protected function addDateToFilter(): void
    {
        $this->filterDTO->getDateTo() ?:
            $this->builder->where('date_start', '<=', $this->filterDTO->getDateTo()
                ->format(DateHelper::DATE_FORMAT));
    }

    /**
     * @return void
     */
    protected function addLevelIdFilter(): void
    {
        $this->filterDTO->getLevelId() ?:
            $this->builder->where('c.level_id', '=', $this->filterDTO->getLevelId());
    }

    /**
     * @return void
     */
    protected function addCourseIdFilter(): void
    {
        $this->filterDTO->getCourseId() ?:
            $this->builder->where('c.id', '=', $this->filterDTO->getCourseId());
    }

    /**
     * @return void
     */
    protected function addFormatIdFilter(): void
    {
        $this->filterDTO->getFormatId() ?:
            $this->builder->where('format_id', '=', $this->filterDTO->getFormatId());
    }

}
