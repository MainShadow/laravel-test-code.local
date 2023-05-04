<?php

namespace App\Http\Controllers\Api\Pub;

use App\DataTransferObjects\FilterDTO;
use App\Http\Requests\Schedule\ScheduleGetDataRequest;
use App\Http\Resources\Pub\Schedule\ScheduleResource;
use App\Service\Calendar\Calendar;
use App\Service\Calendar\DataProvider\Pub\CourseDataProvider;
use App\Service\Course\CourseService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Schedule API
 */
class ScheduleController extends BaseApiController
{
    /**
     * @param ScheduleGetDataRequest $request
     * @param CourseService $courseService
     * @param Calendar $calendar
     *
     * @return AnonymousResourceCollection
     */
    public function getData(
        ScheduleGetDataRequest $request,
        CourseService $courseService,
        Calendar $calendar): AnonymousResourceCollection
    {
        $calendar->addDataProvider(new CourseDataProvider($courseService));

        $events = $calendar->getEvents((new FilterDTO())->fromArray($request->validated()));

        return ScheduleResource::collection(collect($events));
    }
}
