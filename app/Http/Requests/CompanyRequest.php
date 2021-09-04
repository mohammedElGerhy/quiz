<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'Name' => 'required',
            'email' => 'required',
            'logo' => 'required_without:id|mimes:jpg,png,jpeg'
        ];
    }


    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'Name.required' => trans('validation.required'),
            'logo.required' => trans('validation.required'),
            'logo.mimes' => trans('validation.mimes'),
        ];
    }
}
