<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class DisciplineRequest extends FormRequest
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
            'idStaff' => 'required',
            'reason' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên nhân viên là trường bắt buộc nhập',
            'reason.required' => 'Cấp độ là trường bắt buộc nhập',
            'description.required' => 'Ghi chú là trường bắt buộc nhập',

        ];
    }
}
