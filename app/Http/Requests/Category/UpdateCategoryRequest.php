<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

// 内容はStoreと同じ
class UpdateCategoryRequest extends FormRequest
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
            'name'  => 'required',
            'color' => 'required|max:10',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'color.required' => ':attributeは入力して下さい。',
            'color.max' => 'カラーの入力形式が間違っています。',
        ];

    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name'  => 'タスクカテゴリー',
            'color' => 'イメージカラー',
        ];
    }
}
