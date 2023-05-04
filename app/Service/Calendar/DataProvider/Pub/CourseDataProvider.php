<?php

namespace App\Service\Calendar\DataProvider\Pub;

use App\DataTransferObjects\FilterDTO;
use App\Repository\CourseRepository;
use App\Service\Calendar\DataProvider\Filter\CalendarFilter;
use App\Service\Calendar\EventEntity;
use App\Service\Calendar\ProviderInterface;
use App\Service\Course\CourseService;

class CourseDataProvider implements ProviderInterface
{
    /**
     * @var int
     */
    const TYPE = 1;

    /**
     * @var string
     */
    const TYPE_NAME = 'Курс';

    /**
     * @var CourseService
     */
    private CourseService $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     *
     * @param FilterDTO $filterDTO
     * @return array
     */
    public function getEvents(FilterDTO $filterDTO): array
    {
        $events = [];

        $builder = CourseRepository::factory()->getBuilderCatalogForPublic();
        $data = (new CalendarFilter($builder, $filterDTO))->addFilters()->get();

        foreach ($data as $item) {
            $events[] = (new EventEntity())->fromArray($this->courseService->normalizeData($item));
        }

        return $events;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return static::TYPE;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return static::TYPE_NAME;
    }

}
