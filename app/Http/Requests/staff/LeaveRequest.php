<?php

namespace App\Http\Requests\staff;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
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
            'reason' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'reason.required' => 'Lý do xin nghỉ không được phép để trống',
        ];
    }
}
