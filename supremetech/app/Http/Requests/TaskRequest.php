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
                'title' => 'required|min:5|max:255',
                'description' => 'required|min:20|max:1000',
                'type' => 'required|Integer',
                'status' => 'required',
                'start_date' => 'required|date',
                'due_date' => 'required|date|after_or_equal:start_date',
                'assignee' => 'required',
                'estimate' => 'required|numeric|between:0,20.00',
                'actual' => 'required|numeric|between:0,20.00'
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
                'Integer' => ':attribute phải là số nguyên',
                'date' => ':atrribute phải là dạng ngày',
                'numeric' => ':attribute phải là số thập phân'
            ];
    }
}
