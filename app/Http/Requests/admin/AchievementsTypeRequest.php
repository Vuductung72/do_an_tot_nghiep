<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AchievementsTypeRequest extends FormRequest
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
            'name' => 'required|unique:achievement_types',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Loại khen thưởng là trường bắt buộc nhập',
            'name.unique' => 'Loại khen thưởng đã tồn tại'
        ];
    }
}
