<?php

namespace App\DataTransferObjects;

use DateTime;

class FilterDTO extends BaseDTO
{
    /**
     * @var ?DateTime
     */
    protected ?DateTime $date_from = null;

    /**
     * @var ?DateTime
     */
    protected ?DateTime $date_to = null;

    /**
     * @var ?int
     */
    protected ?int $level_id = null;

    /**
     * @var ?int
     */
    protected ?int $course_id = null;

    /**
     * @var ?int
     */
    protected ?int $format_id = null;

    /**
     * @return DateTime|null
     */
    public function getDateFrom(): DateTime|null
    {
        return $this->date_from;
    }

    /**
     * @param DateTime $date_from
     */
    public function setDateFrom(DateTime $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTo(): DateTime|null
    {
        return $this->date_to;
    }

    /**
     * @param DateTime $date_to
     */
    public function setDateTo(DateTime $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @return int|null
     */
    public function getLevelId(): int|null
    {
        return $this->level_id;
    }

    /**
     * @param int $level_id
     */
    public function setLevelId(int $level_id): void
    {
        $this->level_id = $level_id;
    }

    /**
     * @return int|null
     */
    public function getCourseId(): int|null
    {
        return $this->course_id;
    }

    /**
     * @param int $course_id
     */
    public function setCourseId(int $course_id): void
    {
        $this->course_id = $course_id;
    }

    /**
     * @return int|null
     */
    public function getFormatId(): int|null
    {
        return $this->format_id;
    }

    /**
     * @param int $format_id
     */
    public function setFormatId(int $format_id): void
    {
        $this->format_id = $format_id;
    }

    /**
     * @param array $data
     * @return FilterDTO
     */
    public function fromArray(array $data): FilterDTO
    {
        foreach ($data as $key => $value) {
            if ($value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
        return $this;
    }
}
