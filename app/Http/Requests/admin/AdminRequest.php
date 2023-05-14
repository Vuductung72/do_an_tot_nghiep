<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required', 
            'image' => 'required',
            'email' => 'required|unique:admins|email',
            'address' => 'required',
            'phone' => 'required|min:10|max:10',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.max' => 'Tên không được phép quá 255 kí tự',
            'image.required' => 'Hình ảnh không được phép để trống',
            'email.required' => 'Email không được phép để trống',
            'email.email' => 'Nhập đúng định dạng Email',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Số điện thoại không được phép để trống',
            'phone.min' => 'Số điện thoại không được phép dưới 10 kí tự',
            'phone.max' => 'Số điện thoại không được phép quá 10 kí tự',
            'address.required' => 'Địa chỉ không được phép để trống',
            'password.required' => 'Mật khẩu không được phép để trống',
            'password.min' => 'Mật khẩu không được phép dưới 6 kí tự',
        ];
    }
}
