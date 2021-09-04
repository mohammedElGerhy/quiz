<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployRequest extends FormRequest
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

            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'company_id' => 'required|exists:App\Models\company,id'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'first_name.required' => trans('validation.required'),
            'last_name.required' => trans('validation.required'),
            'phone.required' => trans('validation.required'),
            'company_id.exists' => trans('validation.exists'),
        ];
    }
}
