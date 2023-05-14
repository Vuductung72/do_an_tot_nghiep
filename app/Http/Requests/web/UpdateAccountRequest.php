<?php

namespace App\Http\Requests\web;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'name' =>  'required|max:255',
            'phone' => 'required|min:10',
            'address' => 'required|max:255',
            'password' => 'max:15',
            're-password' => 'same:password',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là trường bắt buộc nhập',
            'name.max' => 'Tên không được dài quá 255 ký tự',
            'phone.required' => 'Số điện thoại là trường bắt buộc nhập',
            'phone.min' => 'Số điện thoại tối thiểu 10 số',
            'address.required' => 'Tên là trường bắt buộc nhập',
            'address.max' => 'Tên không được dài quá 255 ký tự',
            'password.max' => 'Mật khẩu tối đa 15 ký tự',
            're-password.same' => 'Nhập lại mật khẩu không khớp',
            're-password.required' => 'Nhập lại mật khẩu là trường bắt buộc nhập',
        ];
    }
}
