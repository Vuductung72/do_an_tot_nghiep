<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => 'required|unique:permissions',
            'label' => 'required|unique:permissions',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên hành động không được để trống',
            'name.unique' => 'Tên hành động đã tồn tại',
            'label.required' => 'Mô tả hành động là trường bắt buộc nhập',
            'label.unique' => 'Mô tả hành động  đã tồn tại',

        ];
    }
}
