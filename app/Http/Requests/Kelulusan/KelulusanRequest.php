<?php

namespace App\Http\Requests\Kelulusan;

use Illuminate\Foundation\Http\FormRequest;

class KelulusanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'nisn' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'status_lulus' => 'required',
        ];
    }
}
