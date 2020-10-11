<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'first_name' => 'required|max:255|min:3',
            'last_name' => 'required|max:255|min:3',
            'patronymic' => 'required|max:255|min:3',
            'date_of_birth' => 'required|date',
            'group_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'group_id.required' => 'Group value is required.'
        ];
    }
}
