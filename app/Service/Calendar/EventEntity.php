<?php

namespace App\Service\Calendar;

/**
 * Class EventEntity
 * @package App\Service\Calendar
 *
 * @example
 * id: '9912',
 * title: 'asdfasdf-asdfasdf',
 * type: '3',
 * code: 'asdf',
 * direction: '1 МЕС',
 * format: 'online',
 * format_id: '9999',
 * link_more: 'http://google.com',
 * join: 'http://google.com',
 * name: 'asdfasdf asdf',
 * start: '2018-11-02',
 * color: '#06a699',
 * price: '6001',
 * last_count: '3',
 * description: 'This is a cool event'
 */
class EventEntity
{
    /**
     * @var int
     */
    public int $id;
    public int $when_id;
    public string $title;
    public int $type;
    public string $code;
    public string $direction;
    public string $format;
    public int $format_id;
    public string $format_short_name;
    public string $format_link;
    public int $level_id;
    public string $level_name;
    public string $link_more;
    public string $join;
    public string $name;
    public string $start;
    public string $color = '#06a699';
    public float $price;
    public int $last_count;
    public $description;
    public $time;
    public $order_url;

    /**
     * @param array $data
     * @return $this
     */
    public function fromArray(array $data): static
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
