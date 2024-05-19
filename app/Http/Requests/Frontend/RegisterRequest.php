<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال اسم المستخدم',
            'city.required' => 'برجاء اختيار مدينة',
            'email.required' => 'برجاء ادخال البريد الالكتروني',
            'email.unique' => 'هذا البريد مستخدم من قبل',
            'phone.required' => 'برجاء ادخال الهاتف' ,
            'phone.unique' => 'هذا الهاتف مستخدم من قبل',
            'password.required' => 'برجاء ادخال كلمة المرور',
            'password.confirmed' => 'برجاء التاكد من كلمة المرور',
        ];
    }
}
