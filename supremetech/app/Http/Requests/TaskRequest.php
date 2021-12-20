<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        return
            [
                'title' => 'required|min:5',
                'description' => 'required|min:20|max:500',
                'type' => 'required',
                'status' => 'required',
                'start_date' => 'required',
                'due_date' => 'required',
                'assignee' => 'required',
                'estimate' => 'required',
                'actual' => 'required'
            ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không lớn hơn :max',
                'min' => ':attribute không nhỏ hơn :min',
            ];
    }
}
