<?php

namespace App\Http\Requests;

use App\Models\classroom;
use App\Models\lecturer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreclassroomRequest extends FormRequest
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
                Rule::unique(classroom::class, 'name'),
            ],
            'lecturer_id' => [
                'bail',
                'required',
                Rule::exists(lecturer::class, 'id'),
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => '*Không được để trống',
            'exists' => '*:attribute chưa được chọn',
            'between' => '*:attribute phải dài hơn :min kí tự và ngắn hơn :max kí tự',
            'unique' => '*:attribute đã được sử dụng',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'lecturer_id' => 'Mã giảng viên',
        ];
    }
}
