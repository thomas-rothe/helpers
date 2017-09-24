<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    public function authorize()
    {
        // return false;
    }
    
    public function rules()
    {
        return [
            'title'     => 'required|unique:posts|max:255',
            'body'      => 'required',
        ];
    }
}
