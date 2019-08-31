<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'category_id'  => 'required|integer',
            'name'  => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'category_id.integer' => ':attributeは選択して入力して下さい。',
        ];

    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'category_id'  => 'カテゴリー名',
            'name'  => 'タスク名',
        ];
    }
}
