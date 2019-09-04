<?php

namespace App\Http\Requests\Hour;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHourRequest extends FormRequest
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
            'hours.*.hour'  => 'required|numeric|between:0.00,24.00',
            // 'hours.*.hour'=> ['required','numeric','regex:/^(?:d{0,2}.d{1,2}|d{1,2})$/','min:0','max:24']
                // 正規表現を用いても、sv側で小数点制御が出来ない。（フロントで制御）
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
