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

        ];
    }

    public function messages()
    {
        return [
            'name.required'   => __('message.issue.required'),
            'name.max'        => __('message.issue.max'),
            'name.min'        => __('message.issue.min'),
        ];
    }
}
