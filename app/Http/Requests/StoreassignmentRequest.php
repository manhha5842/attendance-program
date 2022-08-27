<?php

namespace App\Http\Requests;

use App\Models\classroom;
use App\Models\course;
use App\Models\lecturer;
use App\Models\room;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreassignmentRequest extends FormRequest
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
            'shift' => [
                'required',
                Rule::in(['1', '2', '3', '4']),
            ],
            'lecturer_id' => [
                'bail',
                'required',
                Rule::exists(lecturer::class, 'id'),
            ],
            'classroom_id' => [
                'bail',
                'required',
                Rule::exists(classroom::class, 'id'),
            ],
            'room_id' => [
                'bail',
                'required',
                Rule::exists(room::class, 'id'),
            ],
            'course_id' => [
                'bail',
                'required',
                Rule::exists(course::class, 'id'),
            ],
            'weekday' => [
                'bail',
                'required',
                Rule::in(['2', '3', '4', '5', '6', '7', '8']),
            ],


        ];
    }

    public function messages(): array
    {
        return [
            'required' => '*Không được để trống',
            'exists' => '*:attribute chưa được chọn',
            'in' => '*:attribute không đúng',
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
            'lecturer_id' => 'Giảng viên',
            'classroom_id' => 'Lớp',
            'course_id' => 'Môn học',
            'shift' => 'Ca',
            'weekday' => 'Ngày',
        ];
    }
}
