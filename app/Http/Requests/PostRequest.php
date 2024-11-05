<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|min:1|max:48',
            'message' => 'required|min:12|max:800',
            'categories' => 'required|exists:categories,id',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'title.required' => 'Šis lauks ir obligāts'
        ];
    }
}
