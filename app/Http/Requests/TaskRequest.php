<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title'             => ["bail", "required", "max:20"],
            'content'           => ["bail", "required", "max:200"],
            'person_in_charge'  => ["bail", "required", "max:20"],
        ];
    }

    Public function attributes()
    {
        return [
            'title'             => '「タイトル」',
            'content'           => '「内容」',
            'person_in_charge'  => '担当者',
        ];
    }

    public function messages()
    {
        return [
            'title.required'                => ':attributeを入力してください',
            'title.max'                     => ':attributeは20文字以下を指定してください',
            'content.required'              => ':attributeを入力してください',
            'content.max'                   => ':attributeは200文字以下を指定してください',
            'person_in_charge.required'     => ':attributeを入力してください',
            'person_in_charge.max'          => ':attributeは20文字以下を指定してください',
        ];
    }
}
