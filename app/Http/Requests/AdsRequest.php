<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required',
            'url' => 'required',
            'image' => '  mimes:jpg,jpeg,png',
            'duration' => 'required|max:20',
            'date_from' => 'required',
            'date_to' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is Required',
            'description.required' => 'Description is required',
            'url.required' => 'URL is required',
            'duration.required' => 'Duration is required',
            'date_from.required' => 'Date From is required',
            'date_to.required' => 'Date To is required',
            'image.required' => 'image is required',
            'image.mimes' => 'Image Must be type of jpg,jpeg,png',

        ];
    }
}
