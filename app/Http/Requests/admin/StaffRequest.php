<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'identityCard' => 'required|unique:staff', 
            'image' => 'required',
            'ethnic' => 'required',
            'dateOfBird' => 'required',
            'email' => 'required|unique:staff|email',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'idPosition' => 'required',
            'idDepartment' => 'required',
            'salary' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'identityCard.required' => 'CCCD không được phép để trống',
            'identityCard.unique' => 'CCCD đã tồn tại',
            'image.required' => 'Hình ảnh không được phép để trống',
            'ethnic.required' => 'Dân tộc không được phép để trống',
            'dateOfBird.required' => 'Ngày sinh không được phép để trống',
            'email.required' => 'Email không được phép để trống',
            'email.email' => 'Nhập đúng định dạng Email',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Số điện thoại không được phép để trống',
            'phone.min' => 'Số điện thoại không được phép dưới 10 kí tự',
            'phone.max' => 'Số điện thoại không được phép quá 10 kí tự',
            'address.required' => 'Địa chỉ không được phép để trống',
            'idPosition.required' => 'Chức vụ không được phép để trống',
            'idDepartment.required' => 'Phòng ban không được phép để trống',
            'salary.required' => 'Lương cơ bản không được phép để trống',
            'password.required' => 'Mật khẩu không được phép để trống',
        ];
    }
}
