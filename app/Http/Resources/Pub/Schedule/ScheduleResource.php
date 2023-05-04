<?php

namespace App\Http\Resources\Pub\Schedule;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {

        return [
            "id" => $this->id,
            "when_id" => 2,
            "title" => $this->title,
            "type" => $this->type,
            "code" => $this->code,
            "direction" => $this->direction,
            "link_more" => $this->link_more,
            "join" => $this->join,
            "name" => $this->name,
            "start" => $this->start,
            "color" => $this->color,
            "price" => $this->price,
            "last_count" => $this->last_count,
            "description" => $this->description,
            "time" => $this->time,
            "order_url" => $this->order_url,
            'format' => [
                'id' => $this->format_id,
                'name' => $this->format,
                'name_short' => $this->format_short_name,
                'link' => $this->format_link
            ],
            'level' => [
                'id' => $this->level_id,
                'name' => $this->level_name,
            ],
        ];
    }
}
