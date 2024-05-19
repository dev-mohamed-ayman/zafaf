<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HallRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'size' => 'required',
            'price' => 'required',
            'city_id' => 'required',
            // 'images' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'برجاء ادخال الاسم بالعربي',
            'name_en.required' => 'برجاء ادخال الاسم بالانجليزي',
            'description_ar.required' => 'برجاء ادخال الوصف بالعربي',
            'description_en.required' => 'برجاء ادخال الوصف بالانجليزي',
            'size.required' => 'برجاء ادخال الكمية',
            'price.required' => 'برجاء ادخال السعر',
            'city_id.required' => 'برجاء ادخال مدسنه',
            // 'images.required' => 'برجاء ادخال صورة'
        ];
    }
}
