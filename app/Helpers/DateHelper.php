<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

/**
 * Class DateHelper
 * @package App\Helpers
 */
class DateHelper
{
    /**
     * @var string
     */
    public const DATE_FORMAT = 'Y-m-d';

    /**
     * @var string
     */
    public const DATETIME_FORMAT = 'Y-m-d H:i:s';

    /**
     * @param string $format
     * @return string
     */
    public static function now(string $format = 'Y-m-d H:i:s'):string
    {
        return date($format);
    }

    /**
     * @param $datetime
     * @return string
     */
    public static function strToDatetime($datetime):string
    {
        return date(static::DATETIME_FORMAT, strtotime($datetime));
    }

    /**
     * @param $datetime
     * @return string
     */
    public static function strToDate($datetime):string
    {
        return date(static::DATE_FORMAT, strtotime($datetime));
    }

    /**
     * @param $date
     * @param string $format
     * @return string
     */
    public static function strToDateFormat($date, string $format = 'Y-m-d H:i:s'): string
    {
        return date($format, strtotime($date));
    }

    /**
     * @param $timeFrom
     * @return string
     */
    public static function getTimeFrom($timeFrom): string
    {
        return str_replace('0:00', '0', $timeFrom);
    }

    /**
     * @param $timeTo
     * @return string
     */
    public static function getTimeTo($timeTo): string
    {
        return str_replace('0:00', '0', $timeTo);
    }

    /**
     * @param string $format
     * @return string
     */
    public static function getStartOfWeak(string $format = 'Y-m-d'): string
    {
        return Carbon::now()->startOfWeek()->format($format);
    }

    /**
     * @param string $format
     * @return string
     */
    public static function getEndOfWeak(string $format = 'Y-m-d'): string
    {
        return Carbon::now()->endOfWeek()->format($format);
    }

    /**
     * @param string|null $period
     * @param string $separator
     * @return array|string|null
     */
    public static function parseTwoDates(string $period = null, string $separator = '—'): array|string|null
    {
        if (!$period) {
            return $period;
        }
        if (!str_contains($period, $separator)) {
            return static::strToDate($period);
        }
        $dates = explode($separator, str_replace(' ', '', $period));
        return [
            static::strToDate($dates[0]),
            static::strToDate($dates[1]),
        ];
    }
}
