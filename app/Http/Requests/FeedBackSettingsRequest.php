<?php

namespace App\Http\Requests;

use App\Factories\Feedback\StorageFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeedBackSettingsRequest extends FormRequest
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
            'storage.type' => [
                'required',
                'string',
                Rule::in(array_keys(StorageFactory::$list))
            ],
            'settings.*' => [
                Rule::requiredIf(request()->storage['type'] === 'other_database'),
                'max:20'
            ]
        ];
    }
}
