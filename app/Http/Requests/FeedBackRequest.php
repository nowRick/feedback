<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedBackRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'application' => 'required',
        ];
    }

    /**
     * Get translated attributes.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => __('feedback.attributes.name'),
            'phone' => __('feedback.attributes.phone'),
            'application' => __('feedback.attributes.application'),
        ];
    }
}
