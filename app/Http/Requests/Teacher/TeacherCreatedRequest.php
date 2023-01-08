<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherCreatedRequest extends FormRequest
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
            'teacher' => 'required|unique:teachers|max:50'
        ];
    }

    public function attributes()
    {
        //ganti label
        return [
            'teacher' => "Teacher"
        ];
    }

    public function messages()
    {
        return [
            'teacher.required' => "Wajib di Isi",
            'teacher.unique' => "Nama Teacher Sudah Pernah di Simpan",
            'teacher.max' => "Panjang Nama Teacher Max :max Karakter",
        ];
    }
}
