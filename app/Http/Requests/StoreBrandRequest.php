<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:25'
        ];
    }
}
