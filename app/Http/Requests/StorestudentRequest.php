<?php

namespace App\Http\Requests;

use App\Models\classroom;
use App\Models\student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StorestudentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
                'between:2,50',
            ],
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique(student::class, 'email'),
            ],
            'phone' => [
                'bail',
                'required',
                'numeric',
                Rule::unique(student::class, 'phone'),
            ],
            'gender' => [
                'nullable',
                Rule::in(['1', '0']),
            ],
            'classroom_id' => [
                'bail',
                'required',
                Rule::exists(classroom::class, 'id'),
            ],
            'avatar' => [
                'bail',
                'nullable',
                'file',
                'image'
            ],
            'address' => [
                'nullable'
            ]

        ];
    }

    public function messages(): array
    {
        return [
            'required' => '*Không được để trống',
            'exists' => '*:attribute chưa được chọn',
            'in' => '*:attribute chưa được chọn',
            'between' => '*:attribute phải dài hơn :min kí tự và ngắn hơn :max kí tự',
            'email' => '*Email không đúng định dạng',
            'numeric' => '*:attribute chỉ được nhập các kí tự 0-9',
            'file' => '*:attribute không đúng định dạng',
            'image' => '*:attribute không đúng định dạng',
            'unique' => '*:attribute đã được sử dụng',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'email' => 'email',
            'gender' => 'Giới tính',
            'phone' => 'Số điện thoại',
            'classroom_id' => 'Lớp',
            'avatar' => 'File',
            'address' => 'Địa chỉ',
        ];
    }
}
