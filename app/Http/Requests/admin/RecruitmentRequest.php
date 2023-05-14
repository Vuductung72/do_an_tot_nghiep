<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RecruitmentRequest extends FormRequest
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
            'title' => 'required',
            'position' => 'required',
            'experience' => 'required',
            'quantity' => 'required',
            'wage' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề tuyển dụng là trường bắt buộc nhập',
            'position.required' => 'Vị trí tuyển dụng là trường bắt buộc nhập',
            'experience.required' => 'Yêu cầu kinh nghiệm là trường bắt buộc nhập',
            'quantity.required' => 'Số lượng cần tuyển là trường bắt buộc nhập',
            'wage.required' => 'Lương là trường bắt buộc nhập',
            'description.required' => 'Mô tả là trường bắt buộc nhập',
        ];
    }
}
