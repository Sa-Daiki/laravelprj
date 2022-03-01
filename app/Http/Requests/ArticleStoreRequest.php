<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'title' => 'required|string|max:20',
            'content' => 'required',
            'tag' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "title" => "必須項目です。",
            "content" => "必須項目です。",
            "tag" => "必須項目です。",
        ];
    }
}
