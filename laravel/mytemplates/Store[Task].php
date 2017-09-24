<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /* public function authorize()
    {
        $comment = Comment::find($this->route('comment'));

        return $comment && $this->user()->can('update', $comment);
    } */
    
    public function rules()
    {
        return [
            'title'     => 'required|unique:posts|max:255',
            'body'      => 'required',
        ];
    }
}
