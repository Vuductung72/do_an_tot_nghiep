<?php

namespace App\Http\Requests\staff;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Số điện thoại không được phép để trống',
            'phone.min' => 'Số điện thoại không được phép dưới 10 kí tự',
            'phone.max' => 'Số điện thoại không được phép quá 10 kí tự',
            'address.required' => 'Địa chỉ không được phép để trống',
        ];
    }
}
