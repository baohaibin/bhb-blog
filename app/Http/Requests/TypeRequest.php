<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            //
            'name' => 'required',
            'keywords' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '分类名不能为空',
            'keywords.required' => '关键词不能为空',
            'description.required' => '描述不能为空',
        ];
    }
}
