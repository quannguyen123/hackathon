<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssueRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name'   => 'required|string|max:255|min:1',
            'description'   => 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => __('message.fields.issue.required'),
            'name.max'        => __('message.fields.issue.max'),
            'name.min'        => __('message.fields.issue.min'),
            'description.required'   => __('message.fields.description.required'),
        ];
    }
}
