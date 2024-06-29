<?php

namespace App\Http\Requests\Config;

use Illuminate\Foundation\Http\FormRequest;

class CreateConfigRequest extends FormRequest
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
            'nama_kepsek' => 'required',
            'nip_kepsek' => 'required',
            'nama_web' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            "cap" => 'image|file|mimes:png,jpg,jpeg|max:2048',
            "ttd" => 'image|file|mimes:png,jpg,jpeg|max:2048',
            "logo" => 'image|file|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
