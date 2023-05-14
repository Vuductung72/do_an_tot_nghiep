<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            'name.required' => 'Tên chức vụ là trường bắt buộc nhập',
            'name.unique' => 'Tên Chúc vụ đã tồn tại',
            'code.required' => 'Mã chức vụ là trường bắt buộc nhập',
            'code.unique' => 'Mã chức vụ đã tồn tại',
        ];
    }
}
