<?php

namespace App\Service\Course;

use App\Helpers\DateHelper;

class CourseService
{

    /**
     * @param $item
     * @param string $typeName
     * @param int $type
     * @return array
     */
    public function normalizeData($item, string $typeName = 'Курс', int $type = 1): array
    {
        $formats = FormTraining::withTranslation()->get()->keyBy('id');

        $eventData = [
            'id' => $item->id,
            'when_id' => $item->when_id,
            'title' => $typeName,
            'type' => $type,
            'code' => $item->code,
            'direction' => $item->durationMonth ? $item->durationMonth . ' МЕС' : $item->durationWeek . ' НЕД',
            'format' => $formats[$item->format_id]->name ?? '',
            'format_id' => $item->format_id,
            'format_short_name' => $item->formatNameShort,
            'format_link' => $item->formatLink,
            'level_id' => $item->level_id,
            'level_name' => $item->level_name,
            'link_more' => isset($item->link) && $item->link ? route('course_view', ['link' => $item->link]) . '#format-' . $item->formatLink : '',
            'join' => isset($item->link) && $item->link ? route('course_view', ['link' => $item->link]) . '#format-' . $item->formatLink : '',
            'name' => $item->name,
            'start' => $item->date_start,
            'price' => (int)$item->price,
            'last_count' => $item->count_places,
        ];

        if (!$item->is_not_schedule
            && DateHelper::getTimeFrom($item->time_from)
            && DateHelper::getTimeTo($item->time_to)
        ) {
            $eventData['time'] =
                DateHelper::getTimeFrom($item->time_from) . ' - ' . DateHelper::getTimeTo($item->time_to);
        }

        return $eventData;
    }
}
