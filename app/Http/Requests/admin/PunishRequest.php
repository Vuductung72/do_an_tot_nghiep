<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PunishRequest extends FormRequest
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
            'money' => 'required',
            'reason' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'money.required' => 'Số tiền phạt là trường bắt buộc nhập',
            'reason.required' => 'Lí do là trường bắt buộc nhập',
        ];
    }
}
