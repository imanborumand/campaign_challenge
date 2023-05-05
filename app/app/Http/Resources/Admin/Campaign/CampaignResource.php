<?php

namespace App\Http\Resources\Admin\Campaign;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'start_time' => Carbon::createFromFormat('Y-m-d H:i', $this->start_time)
            ->format("Y-m-d H:i:s"),

            'end_time' => $this->end_time->format('Y-m-d H:i:s'),
            'code' => $this->code,
            'id' => $this->id,
            'usable_number' => $this->usable_number
        ];
    }
}
