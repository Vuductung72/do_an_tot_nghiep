<?php

namespace App\Http\Requests\web;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'name' =>  'required|max:255',
            'phone' => 'required|min:10',
            'address' => 'required|max:255',
            'password' => 'required|min:6|max:15',
            're-password' => 'required|same:password',
        ];

    }

    public function messages()
    {
        return [
            'email.required' => 'Email là trường bắt buộc nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã bị trùng',
            'name.required' => 'Tên là trường bắt buộc nhập',
            'name.max' => 'Tên không được dài quá 255 ký tự',
            'phone.required' => 'Số điện thoại là trường bắt buộc nhập',
            'phone.min' => 'Số điện thoại tối thiểu 10 số',
            'address.required' => 'Tên là trường bắt buộc nhập',
            'address.max' => 'Tên không được dài quá 255 ký tự',
            'password.required' => 'Mật khẩu là trường bắt buộc nhập',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối đa 15 ký tự',
            're-password.required' => 'Mật khẩu là trường bắt buộc nhập',
            're-password.same' => 'Nhập lại mật khẩu không khớp',
            're-password.required' => 'Nhập lại mật khẩu là trường bắt buộc nhập',
        ];
    }
}
