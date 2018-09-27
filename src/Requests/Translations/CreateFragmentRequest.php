<?php

namespace LaravelCMS\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFragmentRequest extends FormRequest
{
    public function authorize ()
    {
        return true;
    }

    public function rules ()
    {
        return [
            'key' => 'required|string',
            'value' => 'required|string',
            'language_id' => 'required'
        ];
    }

    public function withValidator ($validator)
    {
        if ($validator->fails()) {
            \Session::flash('errors', 'Ahora si puta madre!');
        }
    }
}
