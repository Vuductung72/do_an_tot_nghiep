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
            'name' => 'required|max:255',
            'email' => 'required|unique:admins|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.max' => 'Tên không được phép quá 255 kí tự',
            'email.required' => 'Email không được phép để trống',
            'email.email' => 'Nhập đúng định dạng Email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được phép để trống',
            'password.min' => 'Mật khẩu không được phép dưới 6 kí tự',
        ];
    }
}
