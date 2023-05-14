<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => 'required|unique:departments',
            'code' => 'required|unique:departments',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên phòng ban là trường bắt buộc nhập',
            'name.unique' => 'Tên phòng ban đã tồn tại',
            'code.required' => 'Mã phòng ban là trường bắt buộc nhập',
            'code.unique' => 'Mã phòng ban đã tồn tại',
        ];
    }
}
