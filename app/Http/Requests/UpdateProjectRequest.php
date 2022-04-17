<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Project;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'required|unique:projects,name,'. $this->project->id,
            'manager_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
