<?php

namespace App\Http\Requests\Hour;

use Illuminate\Foundation\Http\FormRequest;

class StoreHourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date',
            'hours.*.category_id'  => 'required|integer',
            'hours.*.task_id'  => 'nullable|integer',
            'hours.*.hour'  => 'required|between:0,24',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'date'  => '日付',
            'hours.*.category_id'  => 'カテゴリー',
            'hours.*.task_id'  => 'タスク',
            'hours.*.hour'  => '時間',
        ];
    }
}
