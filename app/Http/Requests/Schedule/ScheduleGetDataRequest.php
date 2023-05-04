<?php

namespace App\Http\Requests\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleGetDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'level_id' => 'integer|exists:levels,id',
            'course_id' => 'integer|exists:courses,id',
            'format_id' => 'integer|exists:form_trainings,id',
            'date_from' => 'date_format:m/d/Y',
            'date_to' => 'date_format:m/d/Y',
        ];
    }
}
