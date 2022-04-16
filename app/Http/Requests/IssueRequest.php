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
            'name'   => 'required|string|max:100|min:1',
            'phone_number'  => 'required|max:18|min:10|regex:/^[0-9\-+()\.]+$/',
            'person_charge' => 'required|max:100|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => __('message.issue_name_required'),
            'name.max'        => __('message.issue_name_max'),
            'name.min'        => __('message.issue_name_min'),
        ];
    }
}
