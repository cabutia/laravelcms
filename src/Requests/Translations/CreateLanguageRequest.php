<?php

namespace LaravelCMS\Requests\Translations;

use Illuminate\Foundation\Http\FormRequest;

class CreateLanguageRequest extends FormRequest
{
    public function authorize ()
    {
        return true;
    }

    public function rules ()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string|size:2',
        ];
    }
    
}
